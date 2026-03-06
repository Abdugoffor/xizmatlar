<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Http\Resources\Service\ServiceResource;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

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
        if ($request->filled('order')) {
            $query->where('order', 'like', '%' . $request->input('order') . '%');
        }
        if ($request->filled('is_main')) {
            $query->where('is_main', 'like', '%' . $request->input('is_main') . '%');
        }
        if ($request->filled('is_active')) {
            $query->where('is_active', 'like', '%' . $request->input('is_active') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('services.index', ['models' => $models]);
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();
        $data['title']['default'] = reset($data['title']);
        $data['description']['default'] = reset($data['description']);
        $data['text']['default'] = reset($data['text']);
        $data['footer_text']['default'] = reset($data['footer_text']);

        Service::create($data);

        return redirect()->route('services.index')
            ->with('notification', getTranslation('Service создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = Service::findOrFail($id);
        return view('services.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = Service::findOrFail($id);
        return view('services.edit', ['model' => $model]);
    }

    public function update(UpdateServiceRequest $request, $lang, $id)
    {
        $model = Service::findOrFail($id);
        $data = $request->validated();
        $data['title']['default'] = reset($data['title']);
        $data['description']['default'] = reset($data['description']);
        $data['text']['default'] = reset($data['text']);
        $data['footer_text']['default'] = reset($data['footer_text']);

        $model->update($data);

        return redirect()->route('services.index')
            ->with('notification', getTranslation('Service обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = Service::findOrFail($id);
        $model->delete();

        return redirect()->route('services.index')
            ->with('notification', getTranslation('Service удалён успешно'));
    }
}