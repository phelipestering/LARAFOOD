@extends('adminlte::page')

@section('title', "Descricao do Perfil {$profile->name}")

@section('content_header')
    <h>Descricao do Perfil{{ $profile->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <ul>
                <li>
                    <strong>Nome: </strong> {{ $profile->name }}
                </li>

                <li>
                    <strong>ID: </strong> {{ $profile->id }}
                </li>

                <li>
                    <strong>Descricao: </strong> {{ $profile->description }}
                </li>
            </ul>

            @include('admin.pages.plans.includes.errors')

        <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">DELETAR O PERFIL {{ $profile->name }}</button>
        </form>
        </div>
    </div>
@stop
