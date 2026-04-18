<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Http\Requests\Video\StoreVideoRequest;
use App\Http\Requests\Video\UpdateVideoRequest;
use App\Http\Resources\Video\VideoResource;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $query = Video::query();


        $models = $query->paginate(10)->withQueryString();
        return view('videos.index', ['models' => $models]);
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(StoreVideoRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('home_video')) {
            $data['home_video'] = FileUploadService::uploadFile($request->file('home_video'));
        }

        Video::create($data);

        return redirect()->route('videos.index')
            ->with('notification', getTranslation('Video создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = Video::findOrFail($id);
        return view('videos.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = Video::findOrFail($id);
        return view('videos.edit', ['model' => $model]);
    }

    public function update(UpdateVideoRequest $request, $lang, $id)
    {
        $model = Video::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('home_video')) {
            $data['home_video'] = FileUploadService::uploadFile($request->file('home_video'));
        } else {
            unset($data['home_video']);
        }

        $model->update($data);

        return redirect()->route('videos.index')
            ->with('notification', getTranslation('Video обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = Video::findOrFail($id);
        $model->delete();

        return redirect()->route('videos.index')
            ->with('notification', getTranslation('Video удалён успешно'));
    }
}