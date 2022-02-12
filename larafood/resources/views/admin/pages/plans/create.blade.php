@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Cadastrar Novo Plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">

                @csrf

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:">
                </div>

                <div class="form-group">
                    <label>Preco:</label>
                    <input type="text" name="price" class="form-control" placeholder="Preco:">
                </div>

                <div class="form-group">
                    <label>Descricao:</label>
                    <input type="text" name="description" class="form-control" placeholder="Descricao:">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>


            </form>
        </div>
    </div>
@stop
