@extends('adminlte::page')

@section('title', "Detalhe do Plano {$plan->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href= "{{ route('admin.index') }}"> Dashboard </a></li>
        <li class="breadcrumb-item"> <a href= "{{ route('plans.index') }}"> Planos </a></li>
        <li class="breadcrumb-item"> <a href= "{{ route('plans.show', $plan->id) }}"> {{ $plan->name }} </a></li>
        <li class="breadcrumb-item active"> <a href= "{{ route('details.plan.index', $plan->id) }}" class="active"> Detalhes </a></li>

    </ol>
    <h1>Detalhes do Plano {{ $plan->name }}<a href="{{ route('details.plan.create', $plan->id) }}" class="btn btn-dark"><i class="fa-solid fa-address-card"></i> Adicionar Novo Detalhe </a></h1>
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
                        <th width="300">Acoes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail )
                        <tr>
                            <td>
                                {{ $detail->name }}
                            </td>

                            <td style="width=10px;">

                                <a href="{{ route('details.plan.edit', [$plan->id, $detail->id]) }}" class="btn btn-info">Editar Detalhe</a>

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

            {!! $details->appends($filters)->links() !!}

        @else

            {!! $details->links() !!}

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
