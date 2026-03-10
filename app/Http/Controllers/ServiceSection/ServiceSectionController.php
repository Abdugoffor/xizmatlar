<?php

namespace App\Http\Controllers\ServiceSection;

use App\Http\Controllers\Controller;
use App\Models\ServiceSection;
use App\Http\Requests\ServiceSection\StoreServiceSectionRequest;
use App\Http\Requests\ServiceSection\UpdateServiceSectionRequest;
use App\Http\Resources\ServiceSection\ServiceSectionResource;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class ServiceSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = ServiceSection::query();
        $models = $query->paginate(10)->withQueryString();
        return view('servicesections.index', ['models' => $models]);
    }

    public function create()
    {
        return view('servicesections.create');
    }

    public function store(StoreServiceSectionRequest $request)
    {
        $data = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }
        if (isset($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }
        if (isset($data['label_1']) && is_array($data['label_1'])) {
            $data['label_1']['default'] = reset($data['label_1']);
        }
        if (isset($data['text_1']) && is_array($data['text_1'])) {
            $data['text_1']['default'] = reset($data['text_1']);
        }
        if (isset($data['label_2']) && is_array($data['label_2'])) {
            $data['label_2']['default'] = reset($data['label_2']);
        }
        if (isset($data['text_2']) && is_array($data['text_2'])) {
            $data['text_2']['default'] = reset($data['text_2']);
        }
        if (isset($data['label_3']) && is_array($data['label_3'])) {
            $data['label_3']['default'] = reset($data['label_3']);
        }
        if (isset($data['text_3']) && is_array($data['text_3'])) {
            $data['text_3']['default'] = reset($data['text_3']);
        }

        if ($request->hasFile('photo_1')) {
            $data['photo_1'] = FileUploadService::uploadFile($request->file('photo_1'));
        }
        if ($request->hasFile('photo_2')) {
            $data['photo_2'] = FileUploadService::uploadFile($request->file('photo_2'));
        }
        if ($request->hasFile('photo_3')) {
            $data['photo_3'] = FileUploadService::uploadFile($request->file('photo_3'));
        }
        if ($request->hasFile('main_photo')) {
            $data['main_photo'] = FileUploadService::uploadFile($request->file('main_photo'));
        }

        ServiceSection::create($data);

        return redirect()->route('servicesections.index')
            ->with('notification', getTranslation('ServiceSection создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = ServiceSection::findOrFail($id);
        return view('servicesections.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = ServiceSection::findOrFail($id);
        return view('servicesections.edit', ['model' => $model]);
    }

    public function update(UpdateServiceSectionRequest $request, $lang, $id)
    {
        $model = ServiceSection::findOrFail($id);
        $data  = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }
        if (isset($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }
        if (isset($data['label_1']) && is_array($data['label_1'])) {
            $data['label_1']['default'] = reset($data['label_1']);
        }
        if (isset($data['text_1']) && is_array($data['text_1'])) {
            $data['text_1']['default'] = reset($data['text_1']);
        }
        if (isset($data['label_2']) && is_array($data['label_2'])) {
            $data['label_2']['default'] = reset($data['label_2']);
        }
        if (isset($data['text_2']) && is_array($data['text_2'])) {
            $data['text_2']['default'] = reset($data['text_2']);
        }
        if (isset($data['label_3']) && is_array($data['label_3'])) {
            $data['label_3']['default'] = reset($data['label_3']);
        }
        if (isset($data['text_3']) && is_array($data['text_3'])) {
            $data['text_3']['default'] = reset($data['text_3']);
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
        if ($request->hasFile('photo_3')) {
            $data['photo_3'] = FileUploadService::uploadFile($request->file('photo_3'));
        } else {
            unset($data['photo_3']);
        }
        if ($request->hasFile('main_photo')) {
            $data['main_photo'] = FileUploadService::uploadFile($request->file('main_photo'));
        } else {
            unset($data['main_photo']);
        }

        $model->update($data);

        return redirect()->route('servicesections.index')
            ->with('notification', getTranslation('ServiceSection обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = ServiceSection::findOrFail($id);
        $model->delete();

        return redirect()->route('servicesections.index')
            ->with('notification', getTranslation('ServiceSection удалён успешно'));
    }
}