@extends('main')

@section('content')
<h2 class="pt-5 text-center">Войти</h2>
<div class="row d-flex justify-content-around pt-3">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="{{ route('login_check') }}" method="POST">
            @csrf
            <span>Никнейм:</span>
            <input type="text" class="form-control mt-2 mb-4" placeholder="Никнейм" name="nickname">
            <span>Пароль:</span>
            <input type="password" class="form-control mt-1 mb-4" placeholder="Пароль" name="password">
            <button type="submit" class="btn btn-outline-primary" style="float:right;">Войти</button>
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