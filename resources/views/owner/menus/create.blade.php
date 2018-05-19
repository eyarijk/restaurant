@extends('layouts.backend')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Створити меню</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="column is-three-fifths">
            <form action="{{ route('owner.menus.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type="hidden" name="place_id" value="1">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Назва</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" name="title" type="text" placeholder="Назва">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Місце</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <div class="select">
                                   <select name="place_id">
                                       @foreach($places as $place)
                                            <option value="{{ $place->id }}">{{ $place->name }}</option>
                                       @endforeach
                                   </select>
                                </div>
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
                    <div class="field-label is-normal"></div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-primary">Створити</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

