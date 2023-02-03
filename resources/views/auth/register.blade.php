@extends('layouts.reference')
@section('title','Register')
@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Crie uma conta!   </h1>
</div>
<form class="user" action="{{url('/register')}}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nome da Empresa" name="name">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha" name="password">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-12 form-group">
            <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Confirme a Senha" name="password_confirmation">
        </div>
    </div>

    <button class="btn btn-primary btn-user btn-block" type="submit">Registrar Conta</button>
    <hr>
</form>
<div class="text-center">
    <a class="small" href="{{url('/login')}}">Já possui uma conta? Faça login!</a>
</div>
@endsection