@extends('layouts.default')
@section('title','Clientes')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabela de Clientes</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Altura</th>
                        <th>Peso</th>
                        <th>Idade</th>
                        <th>Personal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    @if($client->active == 0)
                    <tr>
                        <td><a href="{{url('/clients',[$client->id])}}">{{$client->name}}</a></td>
                        <td>{{$client->telephone}}</td>
                        <td>{{$client->height}}</td>
                        <td>{{$client->weight}}</td>
                        <td>{{$client->age}}</td>
                        <td>{{$client->personal}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection