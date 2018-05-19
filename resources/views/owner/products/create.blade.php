@extends('layouts.backend')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Створити продукт в меню: #{{ $menu->title }}</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="column is-three-fifths">
            <form action="" method="post">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Назва</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="name" type="text" placeholder="Назва">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Опис</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea" name="description" placeholder="Опис"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Ціна в грн.</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="price" type="text" placeholder="100 грн">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="button is-primary">Створити</button>
            </form>
        </div>
        @endsection

