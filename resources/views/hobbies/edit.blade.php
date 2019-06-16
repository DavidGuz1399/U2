@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <form action="/hobby/{{$hobby->slug}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{$hobby->name}}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection