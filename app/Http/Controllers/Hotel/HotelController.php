<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Http\Requests\Hotel\StoreHotelRequest;
use App\Http\Requests\Hotel\UpdateHotelRequest;
use App\Http\Resources\Hotel\HotelResource;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotel::query();

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
        if ($request->filled('latitude')) {
            $query->where('latitude', 'like', '%' . $request->input('latitude') . '%');
        }
        if ($request->filled('longitude')) {
            $query->where('longitude', 'like', '%' . $request->input('longitude') . '%');
        }
        if ($request->filled('is_active')) {
            $query->where('is_active', 'like', '%' . $request->input('is_active') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('hotels.index', ['models' => $models]);
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(StoreHotelRequest $request)
    {
        $data = $request->validated();
        $data['title']['default'] = reset($data['title']);
        $data['description']['default'] = reset($data['description']);
        $data['text']['default'] = reset($data['text']);

        Hotel::create($data);
        return redirect()->route('hotels.index')
            ->with('notification', getTranslation('Hotel создан успешно'));
    }

    public function show($id)
    {
        $model = Hotel::findOrFail($id);
        return view('hotels.show', ['model' => $model]);
    }

    public function edit($id)
    {
        $model = Hotel::findOrFail($id);
        return view('hotels.edit', ['model' => $model]);
    }

    public function update(UpdateHotelRequest $request, $id)
    {
        $model = Hotel::findOrFail($id);
        $data  = $request->validated();
        $data['title']['default'] = reset($data['title']);
        $data['description']['default'] = reset($data['description']);
        $data['text']['default'] = reset($data['text']);

        $model->update($data);
        return redirect()->route('hotels.index')
            ->with('notification', getTranslation('Hotel обновлён успешно'));
    }

    public function destroy($id)
    {
        $model = Hotel::findOrFail($id);
        $model->delete();
        return redirect()->route('hotels.index')
            ->with('notification', getTranslation('Hotel удалён успешно'));
    }
}