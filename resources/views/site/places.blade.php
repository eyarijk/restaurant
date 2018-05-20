@extends('layouts.app')

@section('title')
    Список категорій
@endsection

@section('content')

    <div class="container">
        <div>
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.svg') }}">
                </a>
            </div>
            <div class="input-container">
                <div class="input-wrapper">
                    <input type="text" class="input open" />
                    <span class="icon-container"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
        <section class="best-section">
            <div class="container">
                <h2>Кращі ресторани міста</h2>
                <ul class="products-list">
                    @foreach($best as $item)
                        <li class="col-md-3">
                            <div class="card item">
                                <img class="card-img-top" src="{{ url($item->getImagePath()) }}" alt="{{ $item->name }}">
                                <div class="card-body">
                                    <a href="{{ route('place.show',$item->slug) }}" class="card-title">{{ $item->name }}</a>
                                    <div class="fav-block">
                                        <div class="rating-block">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
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
                            <div class="card item">
                                <img class="card-img-top" src="{{ url($item->getImagePath()) }}" alt="{{ $item->name }}">
                                <div class="card-body">
                                    <a href="{{ route('place.show',$item->slug) }}" class="card-title">{{ $item->name }}</a>
                                    <p style="height: 142px;overflow: hidden;">{{ str_limit($item->description,245) }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        <section class="top-section">
            <div class="container">
                <h2>ВСІ РЕСТОРАНИ</h2>
                <ul class="products-list">
                    @foreach($all as $item)
                        <li class="col-md-3">
                            <div class="card item">
                                <img class="card-img-top" src="{{ url($item->getImagePath()) }}" alt="{{ $item->name }}">
                                <div class="card-body">
                                    <a href="{{ route('place.show',$item->slug) }}" class="card-title">{{ $item->name }}</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        <div class="soc-icons">
            <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i>facebook</a></li>
                <li><a href="#"><i class="fab fa-google-plus-g"></i>google+</a></li>
            </ul>
        </div>
    </div>
@endsection