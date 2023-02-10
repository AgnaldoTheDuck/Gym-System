@extends('layouts.default')
@section('title','Cadastrar Paciente')
@section('content')
<form class="row g-3" method="POST" action="{{url('/clients',['client'=>$client->id])}}">
  @csrf
  @method('PUT')

  <div class="col-md-6">
    <label for="inputName" class="form-label">Nome</label>
    <input type="text" class="form-control" id="inputName" name="name" value="{{$client->name}}" required>
    @error('name')
        {{$message}}
    @enderror
  </div>

  <div class="col-md-6">
    <label for="inputTelephone" class="form-label">Telefone</label>
    <input type="number" class="form-control" id="inputTelephone" name="telephone" required value="{{$client->telephone}}">
    @error('name')
        {{$message}}
    @enderror
  </div>

  <div class="col-md-6">
    <label for="inputHeight" class="form-label">Altura (cm)</label>
    <input type="number" class="form-control" id="inputHeight" name="height" required value="{{$client->height}}"">
    @error('height')
        {{$message}}
    @enderror
  </div>

  <div class="col-6">
    <label for="inputWeight" class="form-label">Peso (kg)</label>
    <input type="number" class="form-control" id="inputWeight" name="weight" required value="{{$client->weight}}""> 
    @error('weight')
        {{$message}}
    @enderror
  </div>

  <div class="col-md-6">
    <label for="inputAge" class="form-label">Idade</label>
    <input type="number" class="form-control" id="inputAge" name="age" required value="{{$client->age}}">
    @error('age')
        {{$message}}
    @enderror
  </div>

  <div class="col-md-6">
    <label for="InputEmployee" class="form-label">Personal</label>
    <select class="form-select form-control" aria-label="Default select example" id="InputEmployee" name="employ">
      @foreach ($employees as $employee)
        @if($client->employee_id == $employee->id)
          <option value="{{$employee->id}}" selected>{{$employee->name}}</option>
        @else
          <option value="{{$employee->id}}">{{$employee->name}}</option>
        @endif
      @endforeach
    </select>
  </div>

  <div class="col-md-12">
    <label for="InputEmployee" class="form-label">Status do Cliente</label>
    <select class="form-select form-control" aria-label="Default select example" id="InputEmployee" name="active">
          <option value="0" selected>Ativo</option>
          <option value="1">Desativado</option>
    </select>
  </div>

  <div class="col mt-4">
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </div>
</form>
@endsection