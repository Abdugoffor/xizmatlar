<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();

        $locale = app()->getLocale();

        if ($request->filled('title')) {

            $search = '%' . $request->input('title') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(title->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(title->>'default') LIKE lower(?)", [$search]);
            });
        }

        if ($request->filled('description')) {

            $search = '%' . $request->input('description') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(description->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(description->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('content')) {

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

            $search = '%' . $request->input('footer_text') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(footer_text->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(footer_text->>'default') LIKE lower(?)", [$search]);
            });
        }

        if ($request->filled('date')) {
            $query->where('date', 'like', '%' . $request->input('date') . '%');
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', 'like', '%' . $request->input('is_active') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('blogs.index', ['models' => $models]);
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(StoreBlogRequest $request)
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

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        $data['slug'] = Str::slug($data['title']['default']);

        $exists = Blog::where('slug', $data['slug'])->exists();

        if ($exists) {
            return back()->with('notification', getTranslation('Выберите другой заголовок, этот уже существует'));
        }

        Blog::create($data);

        return redirect()->route('blogs.index')
            ->with('notification', getTranslation('Blog создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = Blog::findOrFail($id);
        return view('blogs.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = Blog::findOrFail($id);
        return view('blogs.edit', ['model' => $model]);
    }

    public function update(UpdateBlogRequest $request, $lang, $id)
    {
        $model = Blog::findOrFail($id);
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

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        } else {
            unset($data['photo']);
        }

        $model->update($data);

        return redirect()->route('blogs.index')
            ->with('notification', getTranslation('Blog обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = Blog::findOrFail($id);
        $model->delete();

        return redirect()->route('blogs.index')
            ->with('notification', getTranslation('Blog удалён успешно'));
    }
}
