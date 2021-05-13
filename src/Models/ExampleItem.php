<?php

namespace EvolutionCMS\Example\Models;

use Illuminate\Database\Eloquent\Model;

class ExampleItem extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public $rules = [
        'name'        => ['required', 'string', 'max:255'],
        'description' => ['required', 'string'],
    ];
}
