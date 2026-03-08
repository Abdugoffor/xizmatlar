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

        if ($request->filled('section_label')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('section_label') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(section_label->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(section_label->>'default') LIKE lower(?)", [$search]);
            });
        }
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
        if ($request->filled('experience_year')) {
            $query->where('experience_year', 'like', '%' . $request->input('experience_year') . '%');
        }
        if ($request->filled('experience_text')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('experience_text') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(experience_text->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(experience_text->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('block_label1')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('block_label1') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(block_label1->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(block_label1->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('block_title1')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('block_title1') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(block_title1->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(block_title1->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('block_label2')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('block_label2') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(block_label2->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(block_label2->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('block_title2')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('block_title2') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(block_title2->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(block_title2->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('founder_name')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('founder_name') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(founder_name->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(founder_name->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('founder_position')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('founder_position') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(founder_position->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(founder_position->>'default') LIKE lower(?)", [$search]);
            });
        }

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