<?php


namespace App\Http\Controllers\Api;

use App\Place;
use App\Table;
use App\Order;
use App\Customer;
use Illuminate\Http\Request;
use App\Barcode;

class QRCodeController
{
    /**
     * Request data
     * ------------
     *
     * customer_id
     * table_id
     * order_id
     */
    public function qr(Request $request)
    {
        $data = $request->all();

        $customer = Customer::where('id', $request->get('customer_id'))->first();
        $table = Table::where('id', $request->get('table_id'))->first();
        $order = Order::find($data['order_id']);
        $place = Place::where('id', $table->place_id)->first();

        $QRCodeFileName = md5($customer->phone . $order->id . $order->created_at);

        $curl = curl_init();

        $QRCodeData = "
            customer_phone: $customer->phone
            placeId: $table->place_id
            table_number: $table->number
            tableId: $table->id
            orderId: $order->id
            reservation_start_at: $order->time
            order_price: $order->total_price
            reservation_coast: $table->reserve_price
            created_at: $table->updated_at
            "
        ;

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://www.barcodes4.me/barcode/qr/" . $QRCodeFileName . ".png" ."?value=" . urlencode($QRCodeData) . "&size=210x210",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "Postman-Token: a001bb31-ae70-4051-9091-eb35d7964cb0"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        $file = public_path('qrcodes/' . $QRCodeFileName . '.png');
        file_put_contents($file, $response, FILE_APPEND | LOCK_EX);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            Barcode::create([
                'customer_id' => $customer->id,
                'order_id' => $order->id,
                'place_id' => $place->id,
                'table_id' => $table->id,
                'file_path' => 'qrcodes/' . $QRCodeFileName . '.png',
            ]);
            echo $response;
        }
    }
}
