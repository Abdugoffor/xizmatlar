<?php

namespace App\Http\Controllers\Carousel;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Http\Requests\Carousel\StoreCarouselRequest;
use App\Http\Requests\Carousel\UpdateCarouselRequest;
use App\Http\Resources\Carousel\CarouselResource;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index(Request $request)
    {
        $query = Carousel::query();

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
        if ($request->filled('photo')) {
            $query->where('photo', 'like', '%' . $request->input('photo') . '%');
        }
        if ($request->filled('is_active')) {
            $query->where('is_active', 'like', '%' . $request->input('is_active') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('carousels.index', ['models' => $models]);
    }

    public function create()
    {
        return view('carousels.create');
    }

    public function store(StoreCarouselRequest $request)
    {
        $data = $request->validated();
        $data['title']['default'] = reset($data['title']);
        $data['description']['default'] = reset($data['description']);

        Carousel::create($data);

        return redirect()->route('carousels.index')
            ->with('notification', getTranslation('Carousel создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = Carousel::findOrFail($id);
        return view('carousels.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = Carousel::findOrFail($id);
        return view('carousels.edit', ['model' => $model]);
    }

    public function update(UpdateCarouselRequest $request, $lang, $id)
    {
        $model = Carousel::findOrFail($id);
        $data  = $request->validated();
        $data['title']['default'] = reset($data['title']);
        $data['description']['default'] = reset($data['description']);

        $model->update($data);

        return redirect()->route('carousels.index')
            ->with('notification', getTranslation('Carousel обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = Carousel::findOrFail($id);
        $model->delete();

        return redirect()->route('carousels.index')
            ->with('notification', getTranslation('Carousel удалён успешно'));
    }
}
