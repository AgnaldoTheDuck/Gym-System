@extends('layouts.default')
@section('title','Funcionários')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabela de Funcionários</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Salário</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    @if ($employee->active == 0)
                    <tr>
                        <td><a href="{{url('/employees',[$employee->id])}}">{{$employee->name}}</a></td>
                        <td>{{$employee->telephone}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->wage}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection