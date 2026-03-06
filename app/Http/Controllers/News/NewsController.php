<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Http\Resources\News\NewsResource;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

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
        if ($request->filled('text')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('text') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(text->>'{$locale}') LIKE lower(?)", [$search])
                  ->orWhereRaw("lower(text->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('footer_text')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('footer_text') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(footer_text->>'{$locale}') LIKE lower(?)", [$search])
                  ->orWhereRaw("lower(footer_text->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('photo')) {
            $query->where('photo', 'like', '%' . $request->input('photo') . '%');
        }
        if ($request->filled('video')) {
            $query->where('video', 'like', '%' . $request->input('video') . '%');
        }
        if ($request->filled('date')) {
            $query->where('date', 'like', '%' . $request->input('date') . '%');
        }
        if ($request->filled('is_main')) {
            $query->where('is_main', 'like', '%' . $request->input('is_main') . '%');
        }
        if ($request->filled('is_active')) {
            $query->where('is_active', 'like', '%' . $request->input('is_active') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('news.index', ['models' => $models]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(StoreNewsRequest $request)
    {
        $data = $request->validated();
        $data['title']['default'] = reset($data['title']);
        $data['description']['default'] = reset($data['description']);
        $data['text']['default'] = reset($data['text']);
        $data['footer_text']['default'] = reset($data['footer_text']);

        News::create($data);

        return redirect()->route('news.index')
            ->with('notification', getTranslation('News создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = News::findOrFail($id);
        return view('news.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = News::findOrFail($id);
        return view('news.edit', ['model' => $model]);
    }

    public function update(UpdateNewsRequest $request,$lang, $id)
    {
        $model = News::findOrFail($id);
        $data  = $request->validated();
        $data['title']['default'] = reset($data['title']);
        $data['description']['default'] = reset($data['description']);
        $data['text']['default'] = reset($data['text']);
        $data['footer_text']['default'] = reset($data['footer_text']);

        $model->update($data);

        return redirect()->route('news.index')
            ->with('notification', getTranslation('News обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = News::findOrFail($id);
        $model->delete();

        return redirect()->route('news.index')
            ->with('notification', getTranslation('News удалён успешно'));
    }
}