@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">
                    <div>
                        @if (Auth::user()->authorizeView("usuario"))
                            <a href="/hobby/create" class="btn btn-success">Crear</a>
                        @endif
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                @if (Auth::user()->authorizeView("administrador"))
                                <th>Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hobbies as $hobby)
                                <tr>
                                    <td>{{$hobby->id}}</td>
                                    <td>{{$hobby->name}}</td>
                                    <td>{{$hobby->user}}</td>
                                    @if (Auth::user()->authorizeView("administrador"))
                                <td>
                                    <a href="/hobby/{{$hobby->slug}}/edit" class="btn btn-primary">Editar</a>
                                </td>
                                @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection