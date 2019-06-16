@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="/hobby" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection