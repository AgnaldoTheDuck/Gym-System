@extends('layouts.default')
@section('title','Cadastrar Paciente')
@section('content')
<form class="row g-3" method="POST" action="{{url('/clients')}}">
    @csrf

    <div class="col-md-6">
      <label for="inputName" class="form-label">Nome</label>
      <input type="text" class="form-control" id="inputName" name="name">
      @error('name')
          {{$message}}
      @enderror
    </div>

    <div class="col-md-6">
      <label for="inputTelephone" class="form-label">Telefone</label>
      <input type="number" class="form-control" id="inputTelephone" name="telephone">
      @error('name')
          {{$message}}
      @enderror
    </div>

    <div class="col-md-6">
      <label for="inputHeight" class="form-label">Altura (cm)</label>
      <input type="number" class="form-control" id="inputHeight" name="height">
      @error('height')
          {{$message}}
      @enderror
    </div>

    <div class="col-6">
      <label for="inputWeight" class="form-label">Peso (kg)</label>
      <input type="number" class="form-control" id="inputWeight" name="weight">
      @error('weight')
          {{$message}}
      @enderror
    </div>

    <div class="col-md-6">
      <label for="inputAge" class="form-label">Idade</label>
      <input type="number" class="form-control" id="inputAge" name="age">
      @error('age')
          {{$message}}
      @enderror
    </div>

    <div class="col-md-6">
      <label for="InputEmployee" class="form-label">Personal</label>
      <select class="form-select form-control" aria-label="Default select example" id="InputEmployee" name="employ">
        @foreach ($employees as $employee)
            <option value="{{$employee->id}}">{{$employee->name}}</option>
        @endforeach
      </select>
      @error('employee_id')
        {{$message}}
      @enderror
    </div>

    <div class="col mt-4">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </form>
@endsection