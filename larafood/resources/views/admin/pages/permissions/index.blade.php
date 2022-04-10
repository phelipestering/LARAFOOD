@extends('adminlte::page')

@section('title', 'Permissoes')

@section('content_header')
    <h1>Permissoes<a href="{{ route('permissions.create') }}" class="btn btn-dark"><i class="fa-solid fa-address-card"></i> Adicionar </a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href= "{{ route('plans.index') }}"> Dashboard </a></li>
        <li class="breadcrumb-item active"> <a href= "{{ route('permissions.index') }}" class="active">Perfis </a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        {{-- campo pesquisa --}}
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="POST" class= "form form-inline">
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission )
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>

                            <td style="width=10px;">
                                {{-- <a href="{{ route('details.plan.index', $plan->id) }}" class="btn btn-primary">Detalhes</a> --}}
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">

        @if (isset($filters))

            {!! $permissions->appends($filters)->links() !!}

        @else

            {!! $permissions->links() !!}

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
