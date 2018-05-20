@extends('layouts.app')

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
                    <input type="text" class="input open"/>
                    <span class="icon-container"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="desc-block">
            <div class="text-wrap">
                <h1>Hello Burger</h1>
                <h3>Ми, в Hello Burgers свято віримо в те, що кожна людина та її смаки - це унікальне творіння. Тому, ми
                    створюємо наші бургери враховуючи індивідуальні особливості кожного та будуємо наш сервіс таким
                    чином - щоб вам було комфортно насолоджуватись смачними та неперевершеними бургерами.</h3>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <span @click="checkTable">Test</span>
    </div>
@endsection