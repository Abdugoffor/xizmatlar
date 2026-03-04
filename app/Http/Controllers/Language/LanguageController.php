<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Http\Requests\Language\StoreLanguageRequest;
use App\Http\Requests\Language\UpdateLanguageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class LanguageController extends Controller
{
    public function index(Request $request)
    {
        $query = Language::query();
    
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        if ($request->filled('is_active')) {
            $query->where('is_active', 'like', '%' . $request->input('is_active') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('languages.index', ['models' => $models]);
    }

    public function create()
    {
        return view('languages.create');
    }

    public function store(StoreLanguageRequest $request)
    {
        $data = $request->validated();

        Language::create($data);
        Cache::forget('getLanguage');
        return redirect()->route('languages.index')
            ->with('notification', getTranslation('Language создан успешно'));
    }

    public function show($id)
    {
        $model = Language::findOrFail($id);
        return view('languages.show', ['model' => $model]);
    }

    public function edit($id)
    {
        $model = Language::findOrFail($id);
        return view('languages.edit', ['model' => $model]);
    }

    public function update(UpdateLanguageRequest $request, $id)
    {
        $model = Language::findOrFail($id);
        $data  = $request->validated();

        $model->update($data);

        Cache::forget('getLanguage');

        return redirect()->route('languages.index')
            ->with('notification', getTranslation('Language обновлён успешно'));
    }

    public function destroy($id)
    {
        $model = Language::findOrFail($id);
        $model->delete();

        Cache::forget('getLanguage');

        return redirect()->route('languages.index')
            ->with('notification', getTranslation('Language удалён успешно'));
    }

    public function changeLanguage($lang)
    {
        $langs = getLanguage()->pluck('name')->toArray();

        if (in_array($lang, $langs)) {

            session()->put('lang', $lang);

            App::setLocale($lang);

            $referer = request()->header('referer');

            $refererPath = parse_url($referer, PHP_URL_PATH);


            if ($refererPath) {

                $segments = explode('/', trim($refererPath, '/'));


                if (!empty($segments) && in_array($segments[0], $langs)) {
                    $segments[0] = $lang;
                }


                $newUrl = '/' . implode('/', $segments);

                return redirect($newUrl);
            }


            return redirect("/$lang");
        }

        return redirect()->back();

    }
}