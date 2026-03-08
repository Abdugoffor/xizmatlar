<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Http\Resources\Contact\ContactResource;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('phone_1')) {
            $query->where('phone_1', 'like', '%' . $request->input('phone_1') . '%');
        }
        if ($request->filled('phone_2')) {
            $query->where('phone_2', 'like', '%' . $request->input('phone_2') . '%');
        }
        if ($request->filled('email_1')) {
            $query->where('email_1', 'like', '%' . $request->input('email_1') . '%');
        }
        if ($request->filled('email_2')) {
            $query->where('email_2', 'like', '%' . $request->input('email_2') . '%');
        }
        if ($request->filled('address')) {
            $locale = app()->getLocale();
            $search = '%' . $request->input('address') . '%';
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("lower(address->>'{$locale}') LIKE lower(?)", [$search])
                    ->orWhereRaw("lower(address->>'default') LIKE lower(?)", [$search]);
            });
        }
        if ($request->filled('tlegram')) {
            $query->where('tlegram', 'like', '%' . $request->input('tlegram') . '%');
        }
        if ($request->filled('facebook')) {
            $query->where('facebook', 'like', '%' . $request->input('facebook') . '%');
        }
        if ($request->filled('instagram')) {
            $query->where('instagram', 'like', '%' . $request->input('instagram') . '%');
        }
        if ($request->filled('watsapp')) {
            $query->where('watsapp', 'like', '%' . $request->input('watsapp') . '%');
        }
        if ($request->filled('linked')) {
            $query->where('linked', 'like', '%' . $request->input('linked') . '%');
        }

        $models = $query->paginate(10)->withQueryString();
        return view('contacts.index', ['models' => $models]);
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();
        if (isset($data['address']) && is_array($data['address'])) {
            $data['address']['default'] = reset($data['address']);
        }


        Contact::create($data);

        return redirect()->route('contacts.index')
            ->with('notification', getTranslation('Contact создан успешно'));
    }

    public function show($lang, $id)
    {
        $model = Contact::findOrFail($id);
        return view('contacts.show', ['model' => $model]);
    }

    public function edit($lang, $id)
    {
        $model = Contact::findOrFail($id);
        return view('contacts.edit', ['model' => $model]);
    }

    public function update(UpdateContactRequest $request, $lang, $id)
    {
        $model = Contact::findOrFail($id);
        $data = $request->validated();
        if (isset($data['address']) && is_array($data['address'])) {
            $data['address']['default'] = reset($data['address']);
        }


        $model->update($data);

        return redirect()->route('contacts.index')
            ->with('notification', getTranslation('Contact обновлён успешно'));
    }

    public function destroy($lang, $id)
    {
        $model = Contact::findOrFail($id);
        $model->delete();

        return redirect()->route('contacts.index')
            ->with('notification', getTranslation('Contact удалён успешно'));
    }
}