<?php

namespace App\Http\Controllers\Sertificate;

use App\Http\Controllers\Controller;
use App\Models\Sertificate;
use App\Http\Requests\Sertificate\StoreSertificateRequest;
use App\Http\Requests\Sertificate\UpdateSertificateRequest;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class SertificateController extends Controller
{
    public function index(Request $request)
    {
        $query = Sertificate::query();

        if ($request->filled('title')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('title') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(title->>'{$locale}') LIKE lower(?)", [$search])
                  ->orWhereRaw("lower(title->>'default') LIKE lower(?)", [$search]);
            });
        }

        $models = $query->paginate(10)->withQueryString();
        return view('sertificates.index', ['models' => $models]);
    }

    public function create()
    {
        return view('sertificates.create');
    }

    public function store(StoreSertificateRequest $request)
    {
        $data = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }

        if ($request->hasFile('file')) {
            $data['file'] = FileUploadService::uploadFile($request->file('file'));
        }

        Sertificate::create($data);

        return redirect()->route('sertificates.index')
            ->with('notification', getTranslation('Sertificate создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = Sertificate::findOrFail($id);
        return view('sertificates.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = Sertificate::findOrFail($id);
        return view('sertificates.edit', ['model' => $model]);
    }

    public function update(UpdateSertificateRequest $request, $lang, $id)
    {
        $model = Sertificate::findOrFail($id);
        $data  = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }

        if ($request->hasFile('file')) {
            $data['file'] = FileUploadService::uploadFile($request->file('file'));
        } else {
            unset($data['file']);
        }

        $model->update($data);

        return redirect()->route('sertificates.index')
            ->with('notification', getTranslation('Sertificate обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = Sertificate::findOrFail($id);
        $model->delete();

        return redirect()->route('sertificates.index')
            ->with('notification', getTranslation('Sertificate удалён успешно'));
    }
}