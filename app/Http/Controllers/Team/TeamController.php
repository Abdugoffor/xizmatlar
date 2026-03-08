<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
use App\Http\Resources\Team\TeamResource;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $query = Team::query();

        if ($request->filled('name')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('name') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(name->>'{$locale}') LIKE lower(?)", [$search])
                  ->orWhereRaw("lower(name->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('position')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('position') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(position->>'{$locale}') LIKE lower(?)", [$search])
                  ->orWhereRaw("lower(position->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('linked')) {
            $query->where('linked', 'like', '%' . $request->input('linked') . '%');
        }
        if ($request->filled('telegram')) {
            $query->where('telegram', 'like', '%' . $request->input('telegram') . '%');
        }
        if ($request->filled('watsapp')) {
            $query->where('watsapp', 'like', '%' . $request->input('watsapp') . '%');
        }
        if ($request->filled('facebook')) {
            $query->where('facebook', 'like', '%' . $request->input('facebook') . '%');
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }
        if ($request->filled('is_active')) {
            $query->where('is_active', 'like', '%' . $request->input('is_active') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('teams.index', ['models' => $models]);
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(StoreTeamRequest $request)
    {
        $data = $request->validated();
        if (isset($data['name']) && is_array($data['name'])) {
            $data['name']['default'] = reset($data['name']);
        }
        if (isset($data['position']) && is_array($data['position'])) {
            $data['position']['default'] = reset($data['position']);
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        Team::create($data);

        return redirect()->route('teams.index')
            ->with('notification', getTranslation('Team создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = Team::findOrFail($id);
        return view('teams.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = Team::findOrFail($id);
        return view('teams.edit', ['model' => $model]);
    }

    public function update(UpdateTeamRequest $request, $lang, $id)
    {
        $model = Team::findOrFail($id);
        $data  = $request->validated();
        if (isset($data['name']) && is_array($data['name'])) {
            $data['name']['default'] = reset($data['name']);
        }
        if (isset($data['position']) && is_array($data['position'])) {
            $data['position']['default'] = reset($data['position']);
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        } else {
            unset($data['photo']);
        }

        $model->update($data);

        return redirect()->route('teams.index')
            ->with('notification', getTranslation('Team обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = Team::findOrFail($id);
        $model->delete();

        return redirect()->route('teams.index')
            ->with('notification', getTranslation('Team удалён успешно'));
    }
}