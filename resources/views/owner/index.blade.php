@extends('layouts.backend')

@section('content')

    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Тут всі замовлення</h1>
            </div>
        </div>
        <hr class="m-t-0">
        @if (count($oders) > 0)
            @foreach($oders as $oder)
                <div class="card m-b-10">
                    <header class="card-header">
                        <p class="card-header-title">
                           Bla bla bla
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                             Note
                            <br>
                            <time>Час: </time>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <form name="status-" action="/admin/posts/status" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="">
                        </form>
                        <a href="#" class="card-footer-item"><i class="fa fa-pencil m-r-5" aria-hidden="true"></i><span>Редактировать</span></a>
                        <a onclick="forms['delete-'].submit();" class="card-footer-item"><i class="fa fa-trash m-r-5" aria-hidden="true"></i><span>Удалить</span></a>
                    </footer>
                </div>
            @endforeach
        @else
            @include('includes.fail')
        @endif

    </div>
@endsection