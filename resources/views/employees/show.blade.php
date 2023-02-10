@extends('layouts.default')
@section('title','Cadastrar Funcionário')
@section('content')
<form class="row g-3" method="POST" action="{{url('/employees',['employees'=>$employee->id])}}">
    @csrf
    @method('PUT')

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

    <div class="col-md-6">
      <label for="InputEmployee" class="form-label">Personal</label>
      <select class="form-select form-control" aria-label="Default select example" id="InputEmployee" name="categoryid">
        @foreach ($categories as $category)
          @if($employee->category_id == $category->id)
            <option value="{{$category->id}}" selected>{{$category->name}}</option>
          @else
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endif
        @endforeach
      </select>
    </div>

    <div class="col-md-12">
      <label for="InputEmployee" class="form-label">Status do Funcionário</label>
      <select class="form-select form-control" aria-label="Default select example" id="InputEmployee" name="active">
            <option value="0" selected>Ativo</option>
            <option value="1">Desativado</option>
      </select>
    </div>

    <div class="col-12">
    </div>
    <div class="col mt-4">
      <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
  </form>
@endsection