@extends('adminlte::page')

@section('title', "Editar a Permissao {$permission->name}" )

@section('content_header')
    <h1>Editar a {{  $permission->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.permissions._partials.form')
                <div class="form-group">
                    <button type="submit" class="btn btn-success">ATUALIZAR</button>
                </div>
            </form>
        </div>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <script src="https://kit.fontawesome.com/fee8180858.js" crossorigin="anonymous"></script>
@stop
