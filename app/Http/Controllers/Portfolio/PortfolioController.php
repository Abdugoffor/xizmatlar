<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Http\Requests\Portfolio\StorePortfolioRequest;
use App\Http\Requests\Portfolio\UpdatePortfolioRequest;
use App\Http\Resources\Portfolio\PortfolioResource;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = Portfolio::query();

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
        if ($request->filled('is_active')) {
            $query->where('is_active', 'like', '%' . $request->input('is_active') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('portfolios.index', ['models' => $models]);
    }

    public function create()
    {
        return view('portfolios.create');
    }

    public function store(StorePortfolioRequest $request)
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

        Portfolio::create($data);

        return redirect()->route('portfolios.index')
            ->with('notification', getTranslation('Portfolio создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = Portfolio::findOrFail($id);
        return view('portfolios.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = Portfolio::findOrFail($id);
        return view('portfolios.edit', ['model' => $model]);
    }

    public function update(UpdatePortfolioRequest $request, $lang, $id)
    {
        $model = Portfolio::findOrFail($id);
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

        return redirect()->route('portfolios.index')
            ->with('notification', getTranslation('Portfolio обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = Portfolio::findOrFail($id);
        $model->delete();

        return redirect()->route('portfolios.index')
            ->with('notification', getTranslation('Portfolio удалён успешно'));
    }
}