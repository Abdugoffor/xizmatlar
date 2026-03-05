<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }
        if ($request->filled('role')) {
            $query->where('role', 'like', '%' . $request->input('role') . '%');
        }
        if ($request->filled('password')) {
            $query->where('password', 'like', '%' . $request->input('password') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('users.index', ['models' => $models]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        User::create($data);
        return redirect()->route('users.index')
            ->with('notification', getTranslation('User создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = User::findOrFail($id);
        return view('users.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = User::findOrFail($id);
        return view('users.edit', ['model' => $model]);
    }

    public function update(UpdateUserRequest $request,$lang, $id)
    {
        $model = User::findOrFail($id);
        $data  = $request->validated();

        $model->update($data);
        return redirect()->route('users.index')
            ->with('notification', getTranslation('User обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = User::findOrFail($id);
        $model->delete();
        return redirect()->route('users.index')
            ->with('notification', getTranslation('User удалён успешно'));
    }
}