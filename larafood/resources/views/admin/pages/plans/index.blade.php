@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos<a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fa-solid fa-address-card"></i> Adicionar </a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href= "{{ route('admin.index') }}"> Dashboard </a></li>
        <li class="breadcrumb-item active"> <a href= "{{ route('plans.index') }}">Planos</a></li>
    </ol>

@stop


@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class= "form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preco</th>
                        <th width="400">Acoes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan )
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                               R$ {{ number_format($plan->price, 2, ',', '.')  }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('details.plan.index', $plan->id) }}" class="btn btn-primary">Detalhes</a>
                                <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-info">Editar Plano</a>
                                <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-warning">Ver Plano</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">

        @if (isset($filters))

            {!! $plans->appends($filters)->links() !!}

        @else

            {!! $plans->links() !!}

        @endif

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <script src="https://kit.fontawesome.com/fee8180858.js" crossorigin="anonymous"></script>
@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop
