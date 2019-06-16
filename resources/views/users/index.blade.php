@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Nombre de usuario</th>
                                <th>Correo</th>
                                <th>Ciudad</th>
                                @if (Auth::user()->authorizeView("administrador"))
                                <th>Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->user_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->city}}</td>
                                    @if (Auth::user()->authorizeView("administrador"))
                                    <td><a href="/user/{{$user->slug}}/edit" class="btn btn-primary">Editar</a></td>
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
