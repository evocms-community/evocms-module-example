<?php

use EvolutionCMS\Example\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;

Route::get('', [ExampleController::class, 'index'])
    ->name('example::index');

Route::get('edit/{item}', [ExampleController::class, 'edit'])
    ->whereNumber('item')
    ->name('example::edit_item');

Route::post('edit/{item}', [ExampleController::class, 'save'])
    ->whereNumber('item');
