@extends('layouts.app')

@section('content')

    <div class="container">
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
    <div class="row">
        <div class="col-md-5">
            <div class="desc-block">
                <div class="text-wrap">
                    <h1>Hello Burger</h1>
                    <h3>Ми, в Hello Burgers свято віримо в те, що кожна людина та її смаки - це унікальне творіння.
                        Тому, ми
                        створюємо наші бургери враховуючи індивідуальні особливості кожного та будуємо наш сервіс таким
                        чином - щоб вам було комфортно насолоджуватись смачними та неперевершеними бургерами.</h3>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="hero-section">
                <div class="hero-image">
                    <img src="{{ asset('images/places/hero_image.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <h2>Забронюй</h2>
            <div class="book">
                <div class="book-wrap">
                    <label for="date">
                        Дата
                        <input id="date" type="text">
                    </label>
                    <label for="time">
                        Час
                        <input id="time" type="text">
                    </label>
                    <label for="persons">
                        Персона
                        <input id="persons" type="text">
                    </label>
                </div>
                <a class="next-step" href="">далі</a>
            </div>
            <div class="step2-block">
                <div class="text-wrap">
                    <h3>Замов оператив</h3>
                    <p>та прибувши на місце тебе буде чекати обране замовлення</p>
                </div>
                <div class="menu-wrap">
                    <p>Катра коктейлів:</p>
                    <ul>
                        <li><label for="opt1"><input type="checkbox" name="" id="opt1">Манхеттен</label></li>
                        <li><label for="opt2"><input type="checkbox" name="" id="opt2">Мартіні драй</label></li>
                        <li><label for="opt3"><input type="checkbox" name="" id="opt3">Роб Рой</label></li>
                        <li><label for="opt4"><input type="checkbox" name="" id="opt4">Твін Пінке</label></li>
                        <li><label for="opt5"><input type="checkbox" name="" id="opt5">Негрові</label></li>
                        <li><label for="opt6"><input type="checkbox" name="" id="opt6">Мартіні Джус</label></li>
                    </ul>
                </div>
                <a class="next-step" href="">далі</a>
            </div>
        </div>
        <div class="col-md-7">
            <div class="step-book">
                <ul>
                    <li><i class="step1"></i>Крок 1</li>
                    <li><i class="step2"></i>Крок 2</li>
                    <li><i class="step3"></i>Крок 3</li>
                </ul>
            </div>
        </div>
    </div>
@endsection