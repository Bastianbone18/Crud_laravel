<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'due_date', 'status'];
}
// Creado por Juan Sebastian Prieto Montaña
// Este modelo de Laravel representa una tarea en la base de datos. Tiene los campos title, description, due_date y status que pueden ser llenados de forma masiva.