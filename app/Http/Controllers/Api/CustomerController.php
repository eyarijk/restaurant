<?php


namespace App\Http\Controllers\Api;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController
{
    public function createCustomer(Request $request)
    {
        $data = $request->json()->all();

        if (isset($data['customer'])) {
            $customer = Customer::create($data['customer']);

            return response()->json($customer);

        }

        return response()->json([], 400);
    }
}