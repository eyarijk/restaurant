@extends('layouts.app')

@section('content')
    <div class="container" id="app">
        <div class="logo">
            <img src="{{ 'logo.svg' }}">
        </div>
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
                        <span class="icon-container"><i class="fas fa-search"></i></span>
                        <input type="text" class="input open" />
                    </div>
                </div>
                <h2 class="best">КРАЩІ З УЛЮБЛЕНИХ</h2>
                <div class="products">
                    <div class="row margin-bottom">
                        @foreach($first as $value)
                            <div class="col-md-5" style="">
                                <div class="card item" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ url($value->getImagePath()) }}" alt="{{ $value->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $value->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection