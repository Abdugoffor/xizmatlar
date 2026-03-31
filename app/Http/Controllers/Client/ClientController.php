<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::query();

        if ($request->filled('title')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('title') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(title->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(title->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('is_active')) {
            $query->where('is_active', 'like', '%' . $request->input('is_active') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('clients.index', ['models' => $models]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        $data = $request->validated();
        // if (isset($data['title']) && is_array($data['title'])) {
        //     $data['title']['default'] = reset($data['title']);
        // }

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        Client::create($data);

        return redirect()->route('clients.index')
            ->with('notification', getTranslation('Client создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = Client::findOrFail($id);
        return view('clients.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = Client::findOrFail($id);
        return view('clients.edit', ['model' => $model]);
    }

    public function update(UpdateClientRequest $request, $lang, $id)
    {
        $model = Client::findOrFail($id);
        $data  = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        } else {
            unset($data['photo']);
        }

        $model->update($data);

        return redirect()->route('clients.index')
            ->with('notification', getTranslation('Client обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = Client::findOrFail($id);
        $model->delete();

        return redirect()->route('clients.index')
            ->with('notification', getTranslation('Client удалён успешно'));
    }
}
