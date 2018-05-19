@extends('layouts.app')

@section('content')
    <div class="body-grad">
        <div class="container">
            <a href="{{ route('home') }}">
                <div class="logo">
                    <img src="{{ asset('img/logo.svg') }}">
                </div>
            </a>
            <div class="row">
                <div class="col-md-6 description">
                    <div class="title">
                        <h1><b>З НАМИ</b></h1>
                        <h1>Зручно</h1>
                        <h1>Вчасно</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-container">
                        <div class="input-wrapper">
                            <input type="text" class="input open" />
                            <span class="icon-container"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                    <h2 class="best">КРАЩІ З УЛЮБЛЕНИХ</h2>
                    <div class="products">
                        <div class="products-wrap margin-bottom">
                            @foreach($first as $value)
                                {{--<div class="col-md-6" style="">--}}
                                <div class="card item">
                                    <img class="card-img-top" src="{{ url($value->getImagePath()) }}"
                                         alt="{{ $value->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $value->name }}</h5>
                                        <div class="fav-block">
                                            <div class="rating-block">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="like-block">
                                                <span><i class="far fa-heart"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--</div>--}}
                            @endforeach
                        </div>
                        <div class="arrow">
                            <a href=""><img class="arrow-wrap" src="{{  asset('img/arrow.svg') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="soc-icons">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i>facebook</a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i>google+</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection