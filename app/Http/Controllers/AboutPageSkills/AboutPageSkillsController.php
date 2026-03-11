<?php

namespace App\Http\Controllers\AboutPageSkills;

use App\Http\Controllers\Controller;
use App\Models\AboutPageSkills;
use App\Http\Requests\AboutPageSkills\StoreAboutPageSkillsRequest;
use App\Http\Requests\AboutPageSkills\UpdateAboutPageSkillsRequest;
use App\Http\Resources\AboutPageSkills\AboutPageSkillsResource;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class AboutPageSkillsController extends Controller
{
    public function index(Request $request)
    {
        $query = AboutPageSkills::query();
        $models = $query->paginate(10)->withQueryString();
        return view('aboutpageskills.index', ['models' => $models]);
    }

    public function create()
    {
        return view('aboutpageskills.create');
    }

    public function store(StoreAboutPageSkillsRequest $request)
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

        if ($request->hasFile('photo_1')) {
            $data['photo_1'] = FileUploadService::uploadFile($request->file('photo_1'));
        }
        if ($request->hasFile('photo_2')) {
            $data['photo_2'] = FileUploadService::uploadFile($request->file('photo_2'));
        }

        AboutPageSkills::create($data);

        return redirect()->route('aboutpageskills.index')
            ->with('notification', getTranslation('AboutPageSkills создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = AboutPageSkills::findOrFail($id);
        return view('aboutpageskills.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = AboutPageSkills::findOrFail($id);
        return view('aboutpageskills.edit', ['model' => $model]);
    }

    public function update(UpdateAboutPageSkillsRequest $request, $lang, $id)
    {
        $model = AboutPageSkills::findOrFail($id);
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

        if ($request->hasFile('photo_1')) {
            $data['photo_1'] = FileUploadService::uploadFile($request->file('photo_1'));
        } else {
            unset($data['photo_1']);
        }
        if ($request->hasFile('photo_2')) {
            $data['photo_2'] = FileUploadService::uploadFile($request->file('photo_2'));
        } else {
            unset($data['photo_2']);
        }

        $model->update($data);

        return redirect()->route('aboutpageskills.index')
            ->with('notification', getTranslation('AboutPageSkills обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = AboutPageSkills::findOrFail($id);
        $model->delete();

        return redirect()->route('aboutpageskills.index')
            ->with('notification', getTranslation('AboutPageSkills удалён успешно'));
    }
}