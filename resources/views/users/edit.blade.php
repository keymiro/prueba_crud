@extends('layouts.app')
@section('content')

<div class="card-header shadow rounded bg-dark text-white">
    Edición de Usuario
</div>
<div class="container">
    <form class="row g-3 my-4" method="POST" action="{{route('users.update',$user->id)}}">
        @csrf
        @method('PUT')
        <div class="col-md-6">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" required>
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}" required>
        </div>
        <div class="col-6">
            <select class="form-select" aria-label="Default select example" name="gender" required>
                <option value="{{$user->gender}}">{{$user->gender}}</option>
                <option value="female">Mujer</option>
                <option value="male">Hombre</option>
              </select>
        </div>
        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" name="status" required>
                <option value="{{$user->status}}">{{$user->status}}</option>
                <option value="active">Activo</option>
                <option value="inactive">Inactivo</option>
              </select>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
</div>

@endsection
