<?php

namespace App\Http\Controllers\SkillsOption;

use App\Http\Controllers\Controller;
use App\Models\SkillsOption;
use App\Http\Requests\SkillsOption\StoreSkillsOptionRequest;
use App\Http\Requests\SkillsOption\UpdateSkillsOptionRequest;
use Illuminate\Http\Request;

class SkillsOptionController extends Controller
{
    public function index(Request $request)
    {
        $query = SkillsOption::query();
        $models = $query->paginate(10)->withQueryString();
        return view('skillsoptions.index', ['models' => $models]);
    }

    public function create()
    {
        return view('skillsoptions.create');
    }

    public function store(StoreSkillsOptionRequest $request)
    {
        $data = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }


        SkillsOption::create($data);

        return redirect()->route('skillsoptions.index')
            ->with('notification', getTranslation('SkillsOption создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = SkillsOption::findOrFail($id);
        return view('skillsoptions.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = SkillsOption::findOrFail($id);
        return view('skillsoptions.edit', ['model' => $model]);
    }

    public function update(UpdateSkillsOptionRequest $request, $lang, $id)
    {
        $model = SkillsOption::findOrFail($id);
        $data  = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }


        $model->update($data);

        return redirect()->route('skillsoptions.index')
            ->with('notification', getTranslation('SkillsOption обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = SkillsOption::findOrFail($id);
        $model->delete();

        return redirect()->route('skillsoptions.index')
            ->with('notification', getTranslation('SkillsOption удалён успешно'));
    }
}