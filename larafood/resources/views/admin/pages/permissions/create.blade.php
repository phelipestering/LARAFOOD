@extends('adminlte::page')

@section('title', 'Permissoes')

@section('content_header')
    <h1>Cadastro de Permissoes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" class="form" method="POST">

                @csrf

                @include('admin.pages.permissions._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <script src="https://kit.fontawesome.com/fee8180858.js" crossorigin="anonymous"></script>
@stop
