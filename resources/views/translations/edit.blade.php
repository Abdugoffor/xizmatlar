@extends('layouts.admin')
@section('title', getTranslation('Редактировать translation'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('translations.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('translations.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('translation') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('type') }}</label>
                                    <input type="text" class="form-control"
                                           name="type"
                                           value="{{ old('type', $model->type ?? '') }}"
                                           placeholder="{{ getTranslation('type') }}">
                                    @error('type')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('slug') }}</label>
                                    <input type="text" class="form-control"
                                           name="slug"
                                           value="{{ old('slug', $model->slug ?? '') }}"
                                           placeholder="{{ getTranslation('slug') }}">
                                    @error('slug')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('name') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-name">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-name-{{ $lang->id }}"
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
                                                 id="tab-name-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="name[{{ $lang->name }}]"
                                                       value="{{ old('name.' . $lang->name, is_array($model->name) ? ($model->name[$lang->name] ?? $model->name['default'] ?? '') : '') }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('name.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
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