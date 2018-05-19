@extends('layouts.backend')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Меню ресторана</h1>
                <a class="button is-primary" href="{{ route('owner.menus.create') }}">Створити меню</a>
            </div>
        </div>
        <hr class="m-t-0">
        @if (count($menus) > 0)
            @foreach($menus as $menu)
                <div class="card" style="margin-bottom: 20px;">
                    <div class="card-content">
                        <div class="content">
                            {{ $menu->title }}
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{ route('owner.menus.show',$menu->id) }}" class="card-footer-item"><i class="fa fa-trash m-r-5" aria-hidden="true"></i><span>Переглянути продукти</span></a>
                    </footer>
                </div>
            @endforeach
        @else
            <p>Немає меню!</p>
        @endif

    </div>
@endsection