<?php

namespace App\Http\Controllers\Translation;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use App\Http\Requests\Translation\StoreTranslationRequest;
use App\Http\Requests\Translation\UpdateTranslationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TranslationController extends Controller
{
    public function index(Request $request)
    {
        $query = Translation::query();

        if ($request->filled('type')) {
            $query->where('type', 'like', '%' . $request->input('type') . '%');
        }
        if ($request->filled('slug')) {
            $query->where('slug', 'like', '%' . $request->input('slug') . '%');
        }
        if ($request->filled('name')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('name') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(name->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(name->>'default') LIKE lower(?)", [$search]);
            });
        }

        $models = $query->paginate(10)->withQueryString();
        return view('translations.index', ['models' => $models]);
    }

    public function create()
    {
        return view('translations.create');
    }

    public function store(StoreTranslationRequest $request)
    {
        $data = $request->validated();
        $data['name']['default'] = reset($data['name']);

        $translation = Translation::create($data);

        $this->forgetTranslationCache($translation->slug);

        return redirect()->route('translations.index')
            ->with('notification', getTranslation('Translation создан успешно'));
    }

    public function show($id)
    {
        $model = Translation::findOrFail($id);
        return view('translations.show', ['model' => $model]);
    }

    public function edit($id)
    {
        $model = Translation::findOrFail($id);
        return view('translations.edit', ['model' => $model]);
    }

    public function update(UpdateTranslationRequest $request, $id)
    {
        $model = Translation::findOrFail($id);
        $data  = $request->validated();
        $data['name']['default'] = reset($data['name']);

        $model->update($data);

        $this->forgetTranslationCache($model->slug);

        return redirect()->route('translations.index')
            ->with('notification', getTranslation('Translation обновлён успешно'));
    }

    public function destroy($id)
    {
        $model = Translation::findOrFail($id);
        $model->delete();
        return redirect()->route('translations.index')
            ->with('notification', getTranslation('Translation удалён успешно'));
    }

    private function forgetTranslationCache(string $slug): void
    {
        foreach (getLanguage()->pluck('name') as $lang) {
            Cache::forget("menyu.{$slug}_{$lang}");
        }
    }
}
