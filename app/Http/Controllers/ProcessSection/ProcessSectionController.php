<?php

namespace App\Http\Controllers\ProcessSection;

use App\Http\Controllers\Controller;
use App\Models\ProcessSection;
use App\Http\Requests\ProcessSection\StoreProcessSectionRequest;
use App\Http\Requests\ProcessSection\UpdateProcessSectionRequest;
use App\Http\Resources\ProcessSection\ProcessSectionResource;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class ProcessSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = ProcessSection::query();

        if ($request->filled('title')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('title') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(title->>'{$locale}') LIKE lower(?)", [$search])
                  ->orWhereRaw("lower(title->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('description')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('description') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(description->>'{$locale}') LIKE lower(?)", [$search])
                  ->orWhereRaw("lower(description->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('order')) {
            $query->where('order', 'like', '%' . $request->input('order') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('processsections.index', ['models' => $models]);
    }

    public function create()
    {
        return view('processsections.create');
    }

    public function store(StoreProcessSectionRequest $request)
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

        ProcessSection::create($data);

        return redirect()->route('processsections.index')
            ->with('notification', getTranslation('ProcessSection создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = ProcessSection::findOrFail($id);
        return view('processsections.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = ProcessSection::findOrFail($id);
        return view('processsections.edit', ['model' => $model]);
    }

    public function update(UpdateProcessSectionRequest $request, $lang, $id)
    {
        $model = ProcessSection::findOrFail($id);
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

        return redirect()->route('processsections.index')
            ->with('notification', getTranslation('ProcessSection обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = ProcessSection::findOrFail($id);
        $model->delete();

        return redirect()->route('processsections.index')
            ->with('notification', getTranslation('ProcessSection удалён успешно'));
    }
}