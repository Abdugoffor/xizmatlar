<?php

namespace App\Http\Controllers\AboutCompany;

use App\Http\Controllers\Controller;
use App\Models\AboutCompany;
use App\Http\Requests\AboutCompany\StoreAboutCompanyRequest;
use App\Http\Requests\AboutCompany\UpdateAboutCompanyRequest;
use App\Http\Resources\AboutCompany\AboutCompanyResource;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    public function index(Request $request)
    {
        $query = AboutCompany::query();
        $models = $query->paginate(10)->withQueryString();
        return view('aboutcompanies.index', ['models' => $models]);
    }

    public function create()
    {
        return view('aboutcompanies.create');
    }

    public function store(StoreAboutCompanyRequest $request)
    {
        $data = $request->validated();
        if (isset($data['section_label']) && is_array($data['section_label'])) {
            $data['section_label']['default'] = reset($data['section_label']);
        }
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }
        if (isset($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }
        if (isset($data['experience_text']) && is_array($data['experience_text'])) {
            $data['experience_text']['default'] = reset($data['experience_text']);
        }
        if (isset($data['block_label1']) && is_array($data['block_label1'])) {
            $data['block_label1']['default'] = reset($data['block_label1']);
        }
        if (isset($data['block_title1']) && is_array($data['block_title1'])) {
            $data['block_title1']['default'] = reset($data['block_title1']);
        }
        if (isset($data['block_label2']) && is_array($data['block_label2'])) {
            $data['block_label2']['default'] = reset($data['block_label2']);
        }
        if (isset($data['block_title2']) && is_array($data['block_title2'])) {
            $data['block_title2']['default'] = reset($data['block_title2']);
        }
        if (isset($data['founder_name']) && is_array($data['founder_name'])) {
            $data['founder_name']['default'] = reset($data['founder_name']);
        }
        if (isset($data['founder_position']) && is_array($data['founder_position'])) {
            $data['founder_position']['default'] = reset($data['founder_position']);
        }

        if ($request->hasFile('experience_photo')) {
            $data['experience_photo'] = FileUploadService::uploadFile($request->file('experience_photo'));
        }
        if ($request->hasFile('block_photo1')) {
            $data['block_photo1'] = FileUploadService::uploadFile($request->file('block_photo1'));
        }
        if ($request->hasFile('block_photo2')) {
            $data['block_photo2'] = FileUploadService::uploadFile($request->file('block_photo2'));
        }
        if ($request->hasFile('founder_photo')) {
            $data['founder_photo'] = FileUploadService::uploadFile($request->file('founder_photo'));
        }
        if ($request->hasFile('main_photo')) {
            $data['main_photo'] = FileUploadService::uploadFile($request->file('main_photo'));
        }

        AboutCompany::create($data);

        return redirect()->route('aboutcompanies.index')
            ->with('notification', getTranslation('AboutCompany создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = AboutCompany::findOrFail($id);
        return view('aboutcompanies.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = AboutCompany::findOrFail($id);
        return view('aboutcompanies.edit', ['model' => $model]);
    }

    public function update(UpdateAboutCompanyRequest $request, $lang, $id)
    {
        $model = AboutCompany::findOrFail($id);
        $data = $request->validated();
        if (isset($data['section_label']) && is_array($data['section_label'])) {
            $data['section_label']['default'] = reset($data['section_label']);
        }
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }
        if (isset($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }
        if (isset($data['experience_text']) && is_array($data['experience_text'])) {
            $data['experience_text']['default'] = reset($data['experience_text']);
        }
        if (isset($data['block_label1']) && is_array($data['block_label1'])) {
            $data['block_label1']['default'] = reset($data['block_label1']);
        }
        if (isset($data['block_title1']) && is_array($data['block_title1'])) {
            $data['block_title1']['default'] = reset($data['block_title1']);
        }
        if (isset($data['block_label2']) && is_array($data['block_label2'])) {
            $data['block_label2']['default'] = reset($data['block_label2']);
        }
        if (isset($data['block_title2']) && is_array($data['block_title2'])) {
            $data['block_title2']['default'] = reset($data['block_title2']);
        }
        if (isset($data['founder_name']) && is_array($data['founder_name'])) {
            $data['founder_name']['default'] = reset($data['founder_name']);
        }
        if (isset($data['founder_position']) && is_array($data['founder_position'])) {
            $data['founder_position']['default'] = reset($data['founder_position']);
        }

        if ($request->hasFile('experience_photo')) {
            $data['experience_photo'] = FileUploadService::uploadFile($request->file('experience_photo'));
        } else {
            unset($data['experience_photo']);
        }
        if ($request->hasFile('block_photo1')) {
            $data['block_photo1'] = FileUploadService::uploadFile($request->file('block_photo1'));
        } else {
            unset($data['block_photo1']);
        }
        if ($request->hasFile('block_photo2')) {
            $data['block_photo2'] = FileUploadService::uploadFile($request->file('block_photo2'));
        } else {
            unset($data['block_photo2']);
        }
        if ($request->hasFile('founder_photo')) {
            $data['founder_photo'] = FileUploadService::uploadFile($request->file('founder_photo'));
        } else {
            unset($data['founder_photo']);
        }
        if ($request->hasFile('main_photo')) {
            $data['main_photo'] = FileUploadService::uploadFile($request->file('main_photo'));
        } else {
            unset($data['main_photo']);
        }

        $model->update($data);

        return redirect()->route('aboutcompanies.index')
            ->with('notification', getTranslation('AboutCompany обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = AboutCompany::findOrFail($id);
        $model->delete();

        return redirect()->route('aboutcompanies.index')
            ->with('notification', getTranslation('AboutCompany удалён успешно'));
    }
}