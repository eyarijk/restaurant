@extends('layouts.app')

@section('title')
    {{ $place->name }}
@endsection

@section('content')

    <div class="container vh-10">
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
    <div class="row padding-left vh-50">
        <div class="col-md-5">
            <div class="desc-block">
                <div class="text-wrap">
                    <h1>{{ $place->name }}</h1>
                    <h3 style="text-align: justify">{{ $place->description }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="hero-section">
                <div class="hero-image">
                    <img src="{{ url($value->getImagePath()) }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="row padding-left vh-40">
        <div class="col-md-5" v-show="checkStep(0)">
            <h2 class="order">Забронюй</h2>
            <div class="book">
                <div class="book-wrap">
                    <label for="date">
                        Дата
                    </label>
                    <label for="time">
                        Час
                    </label>
                    <label for="persons">
                        Персона
                    </label>
                </div>
                <a class="next-step" @click="nextStep()" href="#">далі</a>
            </div>
        </div>
        <div class="col-md-5 col-wrapper" v-show="checkStep(1)">
            <h2 class="order">Забронюй</h2>
            <div class="book">
                <div class="book-wrap inputs-container book-wrapper">
                        <label for="date">
                            <input v-model="date" id="date" type="text">
                        </label>
                        <label for="time">
                            <input v-model="time" id="time" type="text">
                        </label>
                        <label for="persons">
                            <input name="10" v-model="person_size" id="persons" type="text">
                        </label>
                </div>
                <a class="next-step" @click="nextStep()" href="#">далі</a>
            </div>
        </div>
        <div class="col-md-5" v-show="checkStep(2)">
            <h2 class="order">Забронюй</h2>
            <div class="book">
                <div class="book-wrap">
                    <label for="date">
                        <span v-html="date"></span>
                    </label>
                    <label for="time">
                        <span v-html="time"></span>
                    </label>
                    <label for="persons">
                        <span v-html="getPersons()"></span>
                    </label>
                </div>
                <a class="next-step" @click="nextStep()" href="#">далі</a>
            </div>
        </div>
        <div class="col-md-5 col-col-wr" v-show="checkStep(3)">
            <h2 class="order">Забронюй</h2>
            <div class="step2-block">
                <div class="text-wrap">
                    <h3>Замов оператив</h3>
                    <p>та прибувши на місце тебе буде чекати обране замовлення</p>
                </div>
                <div class="menu-wrap">
                    <p>Карта коктейлів:</p>
                    <ul>
                        <li><label for="opt1"><input v-model="products" type="checkbox" value="1" name="products" id="opt1">Манхеттен</label>
                        </li>
                        <li><label for="opt2"><input v-model="products" type="checkbox" value="2" name="products" id="opt2">Мартіні
                                драй</label></li>
                        <li><label for="opt3"><input v-model="products" type="checkbox" value="3" name="products" id="opt3">Роб
                                Рой</label></li>
                        <li><label for="opt4"><input v-model="products" type="checkbox" value="4" name="products" id="opt4">Твін
                                Пінке</label></li>
                        <li><label for="opt5"><input v-model="products" type="checkbox" value="5" name="products" id="opt5">Негрові</label>
                        </li>
                        <li><label for="opt6"><input v-model="products" type="checkbox" value="6" name="products" id="opt6">Мартіні
                                Джус</label></li>
                    </ul>
                </div>
                <a class="next-step" @click="nextStep()" href="#">далі</a>
            </div>
        </div>
        <div class="col-md-5" v-show="checkStep(4)">
            <h2 class="order">Забронюй</h2>
            <div class="step2-block">
                <div class="text-wrap">
                    <h3>ВІТАЄМО :)</h3>
                    <p>ВИ ЗАБРОНЮВАЛИ СТОЛИК</p>
                    <p>та прибувши на місце тебе буде чекати обране замовлення</p>
                    <p>{{ $place->name }}</p>
                    <span>Введіть номер телефону і отримайте персональний QR-код</span>
                </div>
            </div>
            <div class="book">
                <a class="next-step" @click="nextStep()" href="#">далі</a>
            </div>
        </div>
        <div class="col-md-7 height-100">
            <div class="step-book height-100">
                <div id="map" class="height-100"></div>
                <ul>
                    <li @click="setStep(1)"><i class="step step1"></i>Крок 1</li>
                    <li @click="setStep(2)"><i class="step step2"></i>Крок 2</li>
                    <li @click="setStep(3)"><i class="step step3"></i>Крок 3</li>
                </ul>
            </div>
        </div>
    </div>
    <input id="placeID" type="hidden" value="{{ $place->id }}" v-model="place_id">
@endsection

@include('includes.map')
