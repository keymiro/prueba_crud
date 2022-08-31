@extends('layouts.app')
@section('content')

<div class="card-header shadow rounded bg-dark text-white">
    Listado de Usuarios
</div>
<a href="{{route('users.create')}}" class="btn btn-success my-2">Nuevo Usuario</a>
<div class="table-responsive">
    <table class="table table-dark table-striped my-4 shadow rounded">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Genero</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ( $users as $u )
                <tr>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->gender}}</td>
                    <td>{{$u->status}}</td>
                    <td>
                        <div class="btn-group">

                            <a href="{{route('users.edit',$u->id)}}" class="btn btn-success ">Editar</a>
                            <form  action="{{route('users.destroy',$u->id)}}"
                                method="post">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Estás seguro que desea eliminar el registro?');">Eliminar
                            </button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
