<?php

namespace EvolutionCMS\Example\Controllers;

use EvolutionCMS\Example\Models\ExampleItem;
use EvolutionCMS\Example\Services\{ExampleItems, Module};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ExampleController
{
    protected $module;

    public function __construct(Module $module)
    {
        $this->module = $module;

        View::share([
            'module' => $module,
        ]);
    }

    public function index(Request $request, ExampleItems $items)
    {
        return response()->view('example::index', [
            'list' => $items->getPaginatedList(15),
        ]);
    }

    public function edit(ExampleItem $item)
    {
        $this->module->initRichTextFor(['description']);

        return response()->view('example::edit', [
            'item' => $item,
        ]);
    }

    public function save(Request $request, ExampleItem $item)
    {
        $data = $request->all();
        $validator = validator()->make($data, $item->rules);

        if ($validator->fails()) {
            return redirect()->route('example::edit_item', $item->id)
                ->with('error', __('example::global.some_errors'))
                ->withErrors($validator)
                ->withInput();
        }

        $item->fill($data);
        $item->save();

        return redirect()->route('example::index')
            ->with('success', __('example::global.saved'));
    }
}
