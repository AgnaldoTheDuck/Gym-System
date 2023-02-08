@extends('layouts.default')
@section('title','Cadastrar Funcionário')
@section('content')
<form class="row g-3" method="POST" action="{{url('/employees')}}">
    @csrf

    <div class="col-md-12">
      <label for="inputName" class="form-label">Nome</label>
      <input type="text" class="form-control" id="inputName" name="name" required>
      @error('name')
          {{$message}}
      @enderror
    </div>

    <div class="col-md-6">
      <label for="inputTelephone" class="form-label">Telefone</label>
      <input type="number" class="form-control" id="inputTelephone" name="telephone" required>
      @error('telephone')
          {{$message}}
      @enderror
    </div>

    <div class="col-md-6">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="email" class="form-control" id="inputEmail" name="email" required>
      @error('email')
          {{$message}}
      @enderror
    </div>

    <div class="col-md-6">
      <label for="InputEmployee" class="form-label">Categoria</label>
      <select class="form-select form-control" aria-label="Default select example" id="InputEmployee" name="categoryid">
        @foreach ($categorys as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="col-mt-4">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>

  </form>
@endsection