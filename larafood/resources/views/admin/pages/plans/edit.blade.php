@extends('adminlte::page')

@section('title', "Editar o Plano {$plan->name}" )

@section('content_header')
    <h1>Editar o Plano {{  $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->id) }}" class="form" method="POST">

                @csrf
                @method('PUT')

                @include('admin.pages.plans._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-success">ATUALIZAR</button>
                </div>


            </form>
        </div>
    </div>
@stop
