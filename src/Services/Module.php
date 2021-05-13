<?php

namespace EvolutionCMS\Example\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Module
{
    public function __construct(Request $request)
    {

    }

    public function initRichTextFor($fields = [])
    {
        $richtextinit = evo()->invokeEvent('OnRichTextEditorInit', [
            'editor'   => evo()->getconfig('which_editor'),
            'elements' => $fields,
            'options'  => array_combine($fields, array_fill(0, count($fields), [])),
        ]);

        if (is_array($richtextinit)) {
            $richtextinit = implode($richtextinit);
        }

        View::share([
            'richtextinit' => $richtextinit,
        ]);
    }
}
