@extends('layouts.backend')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Місця</h1>
                <a class="button is-primary" href="{{ route('owner.places.create') }}">Створити місце</a>
            </div>
        </div>
        <hr class="m-t-0">
        @if (count($places) > 0)
            @foreach($places as $place)
                <div class="card" style="margin-bottom: 20px;">
                    <div class="card-content">
                        <div class="content">
                            {{ $place->name }}
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Нічого не знайдено!</p>
        @endif

    </div>
@endsection