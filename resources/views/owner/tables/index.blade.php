@extends('layouts.backend')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Столи</h1>
                <a class="button is-primary" href="{{ route('owner.tables.create') }}">Створити стіл</a>
            </div>
        </div>
        <hr class="m-t-0">
        @if (count($tables) > 0)
            @foreach($tables as $table)
                <div class="card m-b-10">
                    <header class="card-header">
                        <p class="card-header-title">
                            Стол: {{ $table->number }} - на {{ $table->person_size }} людей
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <p>Ціна резерва: {{ $table->getPrice() }} грн.</p>
                        </div>
                    </div>

                </div>
            @endforeach
        @else
            <p>Нічого не знайдено!</p>
        @endif

    </div>
@endsection