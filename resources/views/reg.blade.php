@extends('main')

@section('content')
<h2 class="pt-5 text-center">Регистрация</h2>
<div class="row d-flex justify-content-around pt-3">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="{{ route('reg_create') }}" method="POST">
            @csrf
            <span>Никнейм:</span>
            <input type="text" class="form-control mt-2 mb-4" placeholder="Никнейм" name="nickname">
            <span>Пароль:</span>
            <input type="password" class="form-control mt-1 mb-4" placeholder="Пароль" name="password">
            <span>Повторите пароль:</span>
            <input type="password" class="form-control mt-1 mb-4" placeholder="Повторите пароль" name="repeat_password">
            <button type="submit" class="btn btn-outline-primary style="float:right;">Зарегистрироваться</button>
        </form>
    </div>
    <div class="col-md-4">
        @if ( $errors->any() )
            <ul class="alert alert-danger">
                @foreach ( $errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection