@extends('layouts.backend')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Замовлення: #{{ $order->id }}</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="card m-b-10">
        <header class="card-header">
            <p class="card-header-title">
                {{ $order->customer->getFullName() }} (Стол: {{ $order->table->number }} - на {{ $order->table->person_size }} людей)
            </p>
        </header>
        <div class="card-content">
            <div class="content">
                {{ $order->note }}
                <br>
                <time>Час: {{ $order->time }}</time>
                <hr>
                <ul>
                    @foreach($products as $product)
                        <li>{{ $product->name }} - {{ $product->getPrice() }} грн.</li>
                    @endforeach
                </ul>
                <hr>
                <p>Резерв: {{ $order->table->getPrice() }} грн.</p>
                <p>Продукти: {{ $productsPrice }} грн.</p>
                <p>До сплати: {{ $order->getPrice() }} грн.</p>
            </div>
        </div>
        <footer class="card-footer">
            <form name="status-{{ $order->id }}" action="{{ route('owner.orders.status') }}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{ $order->id }}">
            </form>
            <a onclick="forms['status-{{ $order->id }}'].submit();" class="card-footer-item"><i class="fa fa-trash m-r-5" aria-hidden="true"></i><span>Стіл вільний</span></a>
        </footer>
    </div>
@endsection