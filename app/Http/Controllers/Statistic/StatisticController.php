<?php

namespace App\Http\Controllers\Statistic;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use App\Http\Requests\Statistic\StoreStatisticRequest;
use App\Http\Requests\Statistic\UpdateStatisticRequest;
use App\Http\Resources\Statistic\StatisticResource;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $query = Statistic::query();

        $models = $query->paginate(10)->withQueryString();
        return view('statistics.index', ['models' => $models]);
    }

    public function create()
    {
        return view('statistics.create');
    }

    public function store(StoreStatisticRequest $request)
    {
        $data = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }
        if (isset($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        Statistic::create($data);

        return redirect()->route('statistics.index')
            ->with('notification', getTranslation('Statistic создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = Statistic::findOrFail($id);
        return view('statistics.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = Statistic::findOrFail($id);
        return view('statistics.edit', ['model' => $model]);
    }

    public function update(UpdateStatisticRequest $request, $lang, $id)
    {
        $model = Statistic::findOrFail($id);
        $data  = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }
        if (isset($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        } else {
            unset($data['photo']);
        }

        $model->update($data);

        return redirect()->route('statistics.index')
            ->with('notification', getTranslation('Statistic обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = Statistic::findOrFail($id);
        $model->delete();

        return redirect()->route('statistics.index')
            ->with('notification', getTranslation('Statistic удалён успешно'));
    }
}