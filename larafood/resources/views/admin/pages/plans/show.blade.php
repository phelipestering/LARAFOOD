@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <h1>Detalhes do Plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <ul>
                <li>
                    <strong>Nome: </strong> {{ $plan->name }}
                </li>

                <li>
                    <strong>ID: </strong> {{ $plan->id }}
                </li>

                <li>
                    <strong>Preco: </strong>  R$ {{ number_format($plan->price, 2, ',', '.')  }}
                </li>

                <li>
                    <strong>Descricao: </strong> {{ $plan->description }}
                </li>
            </ul>

            @include('admin.pages.plans.includes.errors')
            
        <form action="{{ route('plans.delete', $plan->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">DELETAR O PLANO {{ $plan->name }}</button>
        </form>
        </div>
    </div>
@stop
