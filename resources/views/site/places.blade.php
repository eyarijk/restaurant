@extends('layouts.app')

@section('content')

    <div class="container">
        <div>
            <div class="logo">
                <img src="logo.svg">
            </div>
            <div class="input-container">
                <div class="input-wrapper">
                    <span class="icon-container"><i class="fas fa-search"></i></span>
                    <input type="text" class="input open" />
                </div>
            </div>
        </div>
        <section class="best-section">
            <div class="container">
                <h2>Кращі ресторани міста</h2>
                <ul class="products-list">
                    @foreach($best as $item)
                        <li class="col-md-3">
                            <div class="card item" style="width: 18rem;">
                                <img class="card-img-top" src="{{ url($item->getImagePath()) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        <section class="top-section">
            <div class="container">
                <h2>ТОП 10</h2>
                <ul class="products-list">
                    @foreach($top as $item)
                        <li class="col-md-3">
                            <div class="card item" style="width: 18rem;">
                                <img class="card-img-top" src="{{ url($item->getImagePath()) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        <section class="top-section">
            <div class="container">
                <h2>ТОП 10</h2>
                <ul class="products-list">
                    @foreach($top as $item)
                        <li class="col-md-3">
                            <div class="card item" style="width: 18rem;">
                                <img class="card-img-top" src="{{ url($item->getImagePath()) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
@endsection