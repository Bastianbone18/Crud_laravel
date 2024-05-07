
@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">CRUD de Tareas</h2>
        </div>
        <div>
            <a href="{{route('tasks.create')}}" class="btn btn-primary">Crear tarea</a>
        </div>
    </div>
    @if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{Session::get('success')}}<br>
        
    </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Tarea</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
            @foreach($tasks as $task)
            <tr>
                <td class="fw-bold">{{$task->title}}</td>
                <td class="fw-bold">{{$task->description}}</td>
                <td class="fw-bold">{{$task->due_date}}</td>
                <td>
                    <span class="badge bg-warning fs-6">{{$task->status}}</span>
                </td>
                <td>
            
                    <a href="" class="btn btn-warning">Editar</a>

                    <form action="{{route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    
                    
                </td>
            </tr>
            @endforeach
        </table>
        {{$tasks->links()}}


    </div>
<!-- Creado por Juan Sebastian Prieto Montaña -->
<!-- Esta vista blade de Laravel muestra una interfaz para un CRUD de tareas. Permite ver, crear, editar y eliminar tareas. La tabla muestra el título, descripción, fecha de vencimiento y estado de cada tarea, con opciones para editar y eliminar cada una. -->
</div>
@endsection