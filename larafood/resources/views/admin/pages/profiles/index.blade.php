@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>Perfis<a href="{{ route('profiles.create') }}" class="btn btn-dark"><i class="fa-solid fa-address-card"></i> Adicionar </a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href= "{{ route('admin.index') }}"> Dashboard </a></li>
        <li class="breadcrumb-item active"> <a href= "{{ route('profiles.index') }}" class="active">Perfis </a></li>
    </ol>

@stop

@section('content')
    <div class="card">
        {{-- campo pesquisa --}}
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class= "form form-inline">
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
                    @foreach ($profiles as $profile )
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            {{-- buttons  --}}

                            <td style="width=10px;">
                                {{-- <a href="{{ route('details.plan.index', $plan->id) }}" class="btn btn-primary">Detalhes</a> --}}
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-warning"><i class="fa-solid fa-lock"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">

        @if (isset($filters))

            {!! $profiles->appends($filters)->links() !!}

        @else

            {!! $profiles->links() !!}

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
