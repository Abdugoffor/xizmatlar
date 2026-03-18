@extends('layouts.admin')
@section('title', getTranslation('Редактировать contact'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('contacts.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('contacts.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('contact') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('phone 1') }}</label>
                                    <input type="text" class="form-control"
                                           name="phone_1"
                                           value="{{ old('phone_1', $model->phone_1 ?? '') }}"
                                           placeholder="{{ getTranslation('phone 1') }}">
                                    @error('phone_1')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('phone 2') }}</label>
                                    <input type="text" class="form-control"
                                           name="phone_2"
                                           value="{{ old('phone_2', $model->phone_2 ?? '') }}"
                                           placeholder="{{ getTranslation('phone 2') }}">
                                    @error('phone_2')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('email 1') }}</label>
                                    <input type="text" class="form-control"
                                           name="email_1"
                                           value="{{ old('email_1', $model->email_1 ?? '') }}"
                                           placeholder="{{ getTranslation('email 1') }}">
                                    @error('email_1')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('email 2') }}</label>
                                    <input type="text" class="form-control"
                                           name="email_2"
                                           value="{{ old('email_2', $model->email_2 ?? '') }}"
                                           placeholder="{{ getTranslation('email 2') }}">
                                    @error('email_2')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('address') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-address">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-address-{{ $lang->id }}"
                                                   class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                   data-toggle="tab">
                                                    {{ $lang->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content border border-top-0 p-2 mb-1">
                                        @foreach (getLanguage() as $lang)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                 id="tab-address-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="address[{{ $lang->name }}]"
                                                       value="{{ old('address.' . $lang->name, is_array($model->address) ? ($model->address[$lang->name] ?? $model->address['default'] ?? '') : '') }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('address.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('tlegram') }}</label>
                                    <input type="text" class="form-control"
                                           name="tlegram"
                                           value="{{ old('tlegram', $model->tlegram ?? '') }}"
                                           placeholder="{{ getTranslation('tlegram') }}">
                                    @error('tlegram')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('facebook') }}</label>
                                    <input type="text" class="form-control"
                                           name="facebook"
                                           value="{{ old('facebook', $model->facebook ?? '') }}"
                                           placeholder="{{ getTranslation('facebook') }}">
                                    @error('facebook')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('instagram') }}</label>
                                    <input type="text" class="form-control"
                                           name="instagram"
                                           value="{{ old('instagram', $model->instagram ?? '') }}"
                                           placeholder="{{ getTranslation('instagram') }}">
                                    @error('instagram')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('watsapp') }}</label>
                                    <input type="text" class="form-control"
                                           name="watsapp"
                                           value="{{ old('watsapp', $model->watsapp ?? '') }}"
                                           placeholder="{{ getTranslation('watsapp') }}">
                                    @error('watsapp')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('linked') }}</label>
                                    <input type="text" class="form-control"
                                           name="linked"
                                           value="{{ old('linked', $model->linked ?? '') }}"
                                           placeholder="{{ getTranslation('linked') }}">
                                    @error('linked')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('location') }}</label>
                                    <input type="text" class="form-control"
                                           name="location"
                                           value="{{ old('location', $model->location ?? '') }}"
                                           placeholder="{{ getTranslation('location') }}">
                                    @error('location')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </fieldset>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">{{ getTranslation('Обновить') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection