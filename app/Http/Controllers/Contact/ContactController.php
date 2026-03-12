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