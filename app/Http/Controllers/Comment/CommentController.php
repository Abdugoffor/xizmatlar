<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $query = Comment::query();

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
        if ($request->filled('is_active')) {
            $query->where('is_active', 'like', '%' . $request->input('is_active') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('comments.index', ['models' => $models]);
    }

    public function create()
    {
        return view('comments.create');
    }

    public function store(StoreCommentRequest $request)
    {
        $data = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }
        if (isset($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        Comment::create($data);

        return redirect()->route('comments.index')
            ->with('notification', getTranslation('Comment создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = Comment::findOrFail($id);
        return view('comments.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = Comment::findOrFail($id);
        return view('comments.edit', ['model' => $model]);
    }

    public function update(UpdateCommentRequest $request, $lang, $id)
    {
        $model = Comment::findOrFail($id);
        $data  = $request->validated();
        if (isset($data['title']) && is_array($data['title'])) {
            $data['title']['default'] = reset($data['title']);
        }
        if (isset($data['description']) && is_array($data['description'])) {
            $data['description']['default'] = reset($data['description']);
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        } else {
            unset($data['photo']);
        }


        $model->update($data);

        return redirect()->route('comments.index')
            ->with('notification', getTranslation('Comment обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = Comment::findOrFail($id);
        $model->delete();

        return redirect()->route('comments.index')
            ->with('notification', getTranslation('Comment удалён успешно'));
    }
}
