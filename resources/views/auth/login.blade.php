@extends('layouts.reference')
@section('title','Login')
@section('content')
<h1 class="h4 text-gray-900 mb-4">Login</h1>
<form class="user" action="{{url('/login')}}" method="POST">
    @csrf
    <div class="form-group">
        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email" autofocus name="email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha" name="password">
    </div>
    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
    <hr>
</form>
<div class="text-center">
    <a class="small" href="{{url('/register')}}">Não tem uma conta? Crie uma!</a>
</div>
@endsection