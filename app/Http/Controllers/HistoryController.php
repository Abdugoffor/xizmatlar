<?php

namespace App\Http\Controllers;

use App\Models\History;

class HistoryController extends Controller
{
    public function show($lang, $model, $id)
    {
        $modelClass = "App\\Models\\" . ucfirst($model);

        if (!class_exists($modelClass)) {
            abort(404);
        }

        $histories = History::where('model_type', $modelClass)
            ->where('model_id', $id)
            ->with('user')
            ->orderByDesc('id')
            ->paginate(10);

        return view('history.show', compact('histories', 'model', 'id'));
    }
}
