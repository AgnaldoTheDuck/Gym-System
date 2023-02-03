@extends('layouts.default')
@section('title','Cadastrar Funcionário')
@section('content')
<form class="row g-3" method="POST" action="{{url('/employees')}}">
    @csrf
    <div class="col-md-12">
      <label for="inputName" class="form-label">Nome</label>
      <input type="text" class="form-control" id="inputName" name="name" required value="{{$employee->name}}">
      @error('name')
          {{$message}}
      @enderror
    </div>
    <div class="col-md-6">
      <label for="inputTelephone" class="form-label">Telefone</label>
      <input type="number" class="form-control" id="inputTelephone" name="telephone" required value="{{$employee->telephone}}">
      @error('telephone')
          {{$message}}
      @enderror
    </div>
    <div class="col-md-6">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="email" class="form-control" id="inputEmail" name="email" required value="{{$employee->email}}">
      @error('email')
          {{$message}}
      @enderror
    </div>
    <div class="col-6">
      <label for="inputWage" class="form-label">Salário (R$)</label>
      <input type="number" class="form-control" id="inputWage" name="wage" required value="{{$employee->wage}}">
      @error('wage')
          {{$message}}
      @enderror
    </div>
    <div class="col-12">
    </div>
    <div class="col mt-4">
      <button type="submit" class="btn btn-primary">Atualizar Dados (Não funciona ainda)</button>
    </div>
  </form>
@endsection