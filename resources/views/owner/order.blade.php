@extends('layouts.backend')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Тут всі замовлення</h1>
            </div>
        </div>
        <hr class="m-t-0">
        @if (count($orders) > 0)
            @foreach($orders as $order)
                <div class="card m-b-10">
                    <header class="card-header">
                        <p class="card-header-title">
                           {{ $order->customer->getFullName() }} (Стол: {{ $order->table->name }} - на {{ $order->table->person_size }} людей)
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            {{ $order->note }}
                            <br>
                            <time>Час: </time>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <form name="status-{{ $order->id }}" action="/admin/posts/status" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="">
                        </form>
                        <a onclick="forms['status-{{ $order->id }}'].submit();" class="card-footer-item"><i class="fa fa-trash m-r-5" aria-hidden="true"></i><span>Стіл вільний</span></a>
                    </footer>
                </div>
            @endforeach
        @else

        @endif

    </div>
@endsection