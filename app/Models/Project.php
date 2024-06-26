<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // aggiungo fillable per ricevere i dati dal form
    protected $fillable = ["title", "link", "description"];
}
