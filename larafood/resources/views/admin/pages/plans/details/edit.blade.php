@extends('adminlte::page')

@section('title', "Editar novo Detalhe do Plano {$detail->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href= "{{ route('admin.index') }}"> Dashboard </a></li>
        <li class="breadcrumb-item"> <a href= "{{ route('plans.index') }}"> Planos </a></li>
        <li class="breadcrumb-item"> <a href= "{{ route('plans.show', $plan->id) }}"> {{ $plan->name }} </a></li>
        <li class="breadcrumb-item"> <a href= "{{ route('details.plan.index', $plan->id) }}" class="active"> Detalhes </a></li>
        <li class="breadcrumb-item active"> <a href= "{{ route('details.plan.edit', [$plan->id, $detail]) }}" class="active">Editar</a></li>
    </ol>
    <h1>Editar novo Detalhe do Plano {{$detail->name}}</h1>
@stop


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.plan.update', [$plan->id, $detail]) }}" method="POST">
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')
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
