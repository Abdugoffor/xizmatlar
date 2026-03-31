<?php

namespace App\Http\Controllers\AboutPageHeader;

use App\Http\Controllers\Controller;
use App\Models\AboutPageHeader;
use App\Http\Requests\AboutPageHeader\StoreAboutPageHeaderRequest;
use App\Http\Requests\AboutPageHeader\UpdateAboutPageHeaderRequest;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class AboutPageHeaderController extends Controller
{
    public function index(Request $request)
    {
        $query = AboutPageHeader::query();

        $models = $query->paginate(10)->withQueryString();
        return view('aboutpageheaders.index', ['models' => $models]);
    }

    public function create()
    {
        return view('aboutpageheaders.create');
    }

    public function store(StoreAboutPageHeaderRequest $request)
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
        if (isset($data['experience_text']) && is_array($data['experience_text'])) {
            $data['experience_text']['default'] = reset($data['experience_text']);
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
        if ($request->hasFile('photo_4')) {
            $data['photo_4'] = FileUploadService::uploadFile($request->file('photo_4'));
        }

        AboutPageHeader::create($data);

        return redirect()->route('aboutpageheaders.index')
            ->with('notification', getTranslation('AboutPageHeader создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = AboutPageHeader::findOrFail($id);
        return view('aboutpageheaders.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = AboutPageHeader::findOrFail($id);
        return view('aboutpageheaders.edit', ['model' => $model]);
    }

    public function update(UpdateAboutPageHeaderRequest $request, $lang, $id)
    {
        $model = AboutPageHeader::findOrFail($id);
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
        if (isset($data['experience_text']) && is_array($data['experience_text'])) {
            $data['experience_text']['default'] = reset($data['experience_text']);
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
        if ($request->hasFile('photo_4')) {
            $data['photo_4'] = FileUploadService::uploadFile($request->file('photo_4'));
        } else {
            unset($data['photo_4']);
        }

        if ($request->hasFile('banner_photo')) {
            $data['banner_photo'] = FileUploadService::uploadFile($request->file('banner_photo'));
        } else {
            unset($data['banner_photo']);
        }

        $model->update($data);

        return redirect()->route('aboutpageheaders.index')
            ->with('notification', getTranslation('AboutPageHeader обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = AboutPageHeader::findOrFail($id);
        $model->delete();

        return redirect()->route('aboutpageheaders.index')
            ->with('notification', getTranslation('AboutPageHeader удалён успешно'));
    }
}
