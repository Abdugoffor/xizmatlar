<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Http\Resources\Service\ServiceResource;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        if ($request->filled('content')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('content') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(content->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(content->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('video_link')) {
            $query->where('video_link', 'like', '%' . $request->input('video_link') . '%');
        }
        if ($request->filled('footer_text')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('footer_text') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(footer_text->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(footer_text->>'default') LIKE lower(?)", [$search]);
            });
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
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }
        if (isset($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }
        if (isset($data['content']) && is_array($data['content'])) {
            $data['content']['default'] = reset($data['content']);
        }
        if (isset($data['footer_text']) && is_array($data['footer_text'])) {
            $data['footer_text']['default'] = reset($data['footer_text']);
        }

        if ($request->hasFile('cart_photo')) {
            $data['cart_photo'] = FileUploadService::uploadFile($request->file('cart_photo'));
        }
        if ($request->hasFile('header_photo')) {
            $data['header_photo'] = FileUploadService::uploadFile($request->file('header_photo'));
        }

        $data['slug'] = Str::slug($data['title']['default']);

        $exists = Service::where('slug', $data['slug'])->exists();

        if ($exists) {
            return back()->with('notification', getTranslation('Выберите другой заголовок, этот уже существует'));
        }
        
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
        $data  = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }
        if (isset($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }
        if (isset($data['content']) && is_array($data['content'])) {
            $data['content']['default'] = reset($data['content']);
        }
        if (isset($data['footer_text']) && is_array($data['footer_text'])) {
            $data['footer_text']['default'] = reset($data['footer_text']);
        }

        if ($request->hasFile('cart_photo')) {
            $data['cart_photo'] = FileUploadService::uploadFile($request->file('cart_photo'));
        } else {
            unset($data['cart_photo']);
        }
        if ($request->hasFile('header_photo')) {
            $data['header_photo'] = FileUploadService::uploadFile($request->file('header_photo'));
        } else {
            unset($data['header_photo']);
        }

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
