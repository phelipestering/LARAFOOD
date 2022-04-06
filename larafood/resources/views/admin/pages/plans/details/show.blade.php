@extends('adminlte::page')

@section('title', "Editar Detalhes {$detail->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href= "{{ route('admin.index') }}"> Dashboard </a></li>
        <li class="breadcrumb-item"> <a href= "{{ route('plans.index') }}"> Planos </a></li>
        <li class="breadcrumb-item"> <a href= "{{ route('plans.show', $plan->id) }}"> {{ $plan->name }} </a></li>
        <li class="breadcrumb-item"> <a href= "{{ route('details.plan.index', $plan->id) }}" class="active"> Detalhes </a></li>
        <li class="breadcrumb-item active"> <a href= "{{ route('details.plan.edit', [$plan->id, $detail]) }}" class="active">Detalhes</a></li>
    </ol>
    <h1>Editar Detalhes {{$detail->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $detail->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('details.plan.destroy', [$plan->id, $detail]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar o Detalhe {{$detail->name}}, do plano {{ $plan->name  }} </button>
            </form>
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <script src="https://kit.fontawesome.com/fee8180858.js" crossorigin="anonymous"></script>
@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop
