@extends('layouts.base')

@section('content')
<div class="row">
   
    <div class="col-12">
        <div>
            <h2>Editar </h2>
        </div>
        <div>
            <a href="{{route('tasks.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   
@endif
    <form action="{{route('tasks.update', $task)}}" method="POST">
        <div class="row">
            @csrf  
            @method('PUT')
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Tarea:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Tarea" value="{{$task->title}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Descripción...">{{$task->description}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Fecha límite:</strong>
                    <input type="date" name="due_date" class="form-control"{{$task->due_date}} id="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Estado (inicial):</strong>
                    <select name="status" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="Pendiente">@select ("Pendiente" ==$task->status)Pendiente</option>
                        <option value="En progreso"@select ("En Progreso" ==$task->status)>En progreso</option>
                        <option value="Completada">@select ("Completada" ==$task->status)Completada</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection
<!-- Creado por Juan Sebastian Prieto Montaña -->
<!-- Esta vista blade de Laravel muestra un formulario para editar una tarea específica. Permite actualizar el título, la descripción, la fecha límite y el estado de la tarea. También maneja errores de validación y proporciona un enlace para volver a la lista de tareas. -->





