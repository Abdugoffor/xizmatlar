<?php

namespace App\Http\Controllers\BannerPhoto;

use App\Http\Controllers\Controller;
use App\Models\BannerPhoto;
use App\Http\Requests\BannerPhoto\StoreBannerPhotoRequest;
use App\Http\Requests\BannerPhoto\UpdateBannerPhotoRequest;
use App\Http\Resources\BannerPhoto\BannerPhotoResource;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class BannerPhotoController extends Controller
{
    public function index(Request $request)
    {
        $query = BannerPhoto::query();
        $models = $query->paginate(10)->withQueryString();
        return view('bannerphotos.index', ['models' => $models]);
    }

    public function create()
    {
        return view('bannerphotos.create');
    }

    public function store(StoreBannerPhotoRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('service_photo')) {
            $data['service_photo'] = FileUploadService::uploadFile($request->file('service_photo'));
        }
        if ($request->hasFile('blog_photo')) {
            $data['blog_photo'] = FileUploadService::uploadFile($request->file('blog_photo'));
        }
        if ($request->hasFile('team_photo')) {
            $data['team_photo'] = FileUploadService::uploadFile($request->file('team_photo'));
        }
        if ($request->hasFile('contact_photo')) {
            $data['contact_photo'] = FileUploadService::uploadFile($request->file('contact_photo'));
        }

        BannerPhoto::create($data);

        return redirect()->route('bannerphotos.index')
            ->with('notification', getTranslation('BannerPhoto создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = BannerPhoto::findOrFail($id);
        return view('bannerphotos.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = BannerPhoto::findOrFail($id);
        return view('bannerphotos.edit', ['model' => $model]);
    }

    public function update(UpdateBannerPhotoRequest $request, $lang,  $id)
    {
        $model = BannerPhoto::findOrFail($id);
        $data  = $request->validated();

        if ($request->hasFile('service_photo')) {
            $data['service_photo'] = FileUploadService::uploadFile($request->file('service_photo'));
        } else {
            unset($data['service_photo']);
        }
        if ($request->hasFile('blog_photo')) {
            $data['blog_photo'] = FileUploadService::uploadFile($request->file('blog_photo'));
        } else {
            unset($data['blog_photo']);
        }
        if ($request->hasFile('team_photo')) {
            $data['team_photo'] = FileUploadService::uploadFile($request->file('team_photo'));
        } else {
            unset($data['team_photo']);
        }
        if ($request->hasFile('contact_photo')) {
            $data['contact_photo'] = FileUploadService::uploadFile($request->file('contact_photo'));
        } else {
            unset($data['contact_photo']);
        }

        $model->update($data);

        return redirect()->route('bannerphotos.index')
            ->with('notification', getTranslation('BannerPhoto обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = BannerPhoto::findOrFail($id);
        $model->delete();

        return redirect()->route('bannerphotos.index')
            ->with('notification', getTranslation('BannerPhoto удалён успешно'));
    }
}
