<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $task = Task::latest()->paginate(3);
        return view('index', ['tasks' => $task]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);


        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'NUEVA TAREA CREADA EXITOSAMENTE');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {


        return view('edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'NUEVA TAREA ACTUALIZADA EXITOSAMENTE');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', '¡La tarea ha sido eliminada exitosamente!');
    }
}
// Creado por Juan Sebastian Prieto Montaña
// Este controlador de Laravel maneja las operaciones CRUD (Crear, Leer, Actualizar, Eliminar) para las tareas. Define métodos para mostrar una lista de tareas, crear una nueva tarea, almacenarla en la base de datos, mostrar detalles de una tarea específica, editar una tarea existente, actualizar los datos de una tarea y eliminar una tarea.
