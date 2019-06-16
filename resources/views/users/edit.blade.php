@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <form action="/user/{{$user->slug}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group">
                    <label for="">Nombre de usuario</label>
                    <input type="text" name="user_name" class="form-control" value="{{$user->user_name}}">
            </div>
            <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="form-group">
                    <label for="">Ciudad</label>
                    <input type="text" name="city" class="form-control" value="{{$user->city}}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection