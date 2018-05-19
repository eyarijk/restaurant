@extends('layouts.backend')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Меню {{ $menu->title }}</h1>
            </div>
        </div>
        <hr class="m-t-0">
        @if (count($products) > 0)
            @foreach($products as $product)
                <form action="{{ route('owner.product.delete',$product->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-content">
                            <div class="content">
                                <p>Назва: {{ $product->name }}</p>
                                <p>Ціна: {{ $product->getPrice() }} грн.</p>
                                <p>Опис: {{ $product->description }}</p>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a href="{{ route('owner.product.delete',$product->id) }}" class="card-footer-item"><i class="fa fa-trash m-r-5" aria-hidden="true"></i><span>Видалити продукт</span></a>
                        </footer>
                    </div>
                </form>
            @endforeach

        @else
            <p>Немає продуктів!</p>
        @endif
        <a href="{{ route('owner.product.create',$menu->id) }}" class="button is-primary">Додати продукти</a>
    </div>
@endsection