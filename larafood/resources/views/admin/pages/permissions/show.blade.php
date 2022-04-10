@extends('adminlte::page')

@section('title', "Descricao Permissao {$permission->name}")

@section('content_header')
    <h>Descricao de {{ $permission->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permission->name }}
                </li>

                <li>
                    <strong>ID: </strong> {{ $permission->id }}
                </li>

                <li>
                    <strong>Descricao: </strong> {{ $permission->description }}
                </li>
            </ul>

            @include('admin.pages.plans.includes.errors')

        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">DELETAR a - {{ $permission->name }}</button>
        </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <script src="https://kit.fontawesome.com/fee8180858.js" crossorigin="anonymous"></script>
@stop
