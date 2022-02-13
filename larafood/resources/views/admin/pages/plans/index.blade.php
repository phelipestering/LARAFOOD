@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            #filtros
        </div>
        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preco</th>
                        <th style="width:10px;">Acoes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan )
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                                {{ number_format($plan->price, 2, ',', '.')  }}
                            </td>
                            <td style="width:10px;">
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">Ver Plano</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        {!! $plans->links() !!}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
