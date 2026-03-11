<?php

namespace App\Http\Controllers\AboutStatistic;

use App\Http\Controllers\Controller;
use App\Models\AboutStatistic;
use App\Http\Requests\AboutStatistic\StoreAboutStatisticRequest;
use App\Http\Requests\AboutStatistic\UpdateAboutStatisticRequest;
use Illuminate\Http\Request;

class AboutStatisticController extends Controller
{
    public function index(Request $request)
    {
        $query = AboutStatistic::query();

        $models = $query->paginate(10)->withQueryString();
        return view('aboutstatistics.index', ['models' => $models]);
    }

    public function create()
    {
        return view('aboutstatistics.create');
    }

    public function store(StoreAboutStatisticRequest $request)
    {
        $data = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }
        if (isset($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }
        if (isset($data['text']) && is_array($data['text'])) {
            $data['text']['default'] = reset($data['text']);
        }


        AboutStatistic::create($data);

        return redirect()->route('aboutstatistics.index')
            ->with('notification', getTranslation('AboutStatistic создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = AboutStatistic::findOrFail($id);
        return view('aboutstatistics.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = AboutStatistic::findOrFail($id);
        return view('aboutstatistics.edit', ['model' => $model]);
    }

    public function update(UpdateAboutStatisticRequest $request, $lang, $id)
    {
        $model = AboutStatistic::findOrFail($id);
        $data  = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }
        if (isset($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }
        if (isset($data['text']) && is_array($data['text'])) {
            $data['text']['default'] = reset($data['text']);
        }


        $model->update($data);

        return redirect()->route('aboutstatistics.index')
            ->with('notification', getTranslation('AboutStatistic обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = AboutStatistic::findOrFail($id);
        $model->delete();

        return redirect()->route('aboutstatistics.index')
            ->with('notification', getTranslation('AboutStatistic удалён успешно'));
    }
}