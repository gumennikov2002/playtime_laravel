@extends('main')
<div id="popUpContainer"></div>

@section('content')
    <div class="container pt-4"><h2>Математические игры</h2></div>
    <div class="row d-flex justify-content-start pt-4" id="gameList"></div>
@endsection

@section('scripts')
    <script src="/js/Controller.js"></script>
    <script src="/js/GameController.js"></script>
@endsection
