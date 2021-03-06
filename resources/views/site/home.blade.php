@extends('layouts.app')

@section('title')
    Головна
@endsection

@section('content')

    <div class="body-grad" id="app">
        <div class="container">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.svg') }}">
                </a>
            </div>
            <div class="row">
                <div class="col-md-6 description">
                    <div class="title">
                        <h1><b>ОБИРАЙ ТА</b></h1>
                        <h1><b>БРОНЮЙ</b></h1>
                        <h1>СВОЄ МІСЦЕ</h1>
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
                                <div class="card item">
                                    <img class="card-img-top" src="{{ url($value->getImagePath()) }}"
                                         alt="{{ $value->name }}">
                                    <div class="card-body">
                                        <a href="{{ route('place.show',$value->slug) }}" class="card-title">{{ $value->name }}</a>
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
                            @endforeach
                        </div>
                        <div class="arrow">
                            <a href="{{ route('places') }}"><img class="arrow-wrap" src="{{  asset('img/arrow.svg') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="soc-icons">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i>facebook</a></li>
                            <li>
                                <a href="#">
                                    {{--
                                        todo: Example call for create open event for DateTimePicker
                                    --}}
                                    <i class="fab fa-google-plus-g" @click="openPicker"></i>
                                    google+
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection