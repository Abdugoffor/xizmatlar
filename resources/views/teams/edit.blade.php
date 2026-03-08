@extends('layouts.admin')
@section('title', getTranslation('Редактировать team'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('teams.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('teams.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('team') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

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
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('position') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-position">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-position-{{ $lang->id }}"
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
                                                 id="tab-position-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="position[{{ $lang->name }}]"
                                                       value="{{ old('position.' . $lang->name, is_array($model->position) ? ($model->position[$lang->name] ?? $model->position['default'] ?? '') : '') }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('position.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('photo') }}</label>
                                    @if(!empty($model->photo))
                                        <div class="mb-2">
                                            <a href="{{ asset($model->photo) }}" target="_blank">
                                                {{ getTranslation('Current file') }}
                                            </a>
                                        </div>

                                        @php
                                            $extension = strtolower(pathinfo($model->photo, PATHINFO_EXTENSION));
                                        @endphp

                                        @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                            <div class="mb-2">
                                                <img src="{{ asset($model->photo) }}" alt="photo" style="max-height:120px; border-radius:8px;">
                                            </div>
                                        @endif
                                    @endif
                                    <input type="file" class="form-control" name="photo">
                                    @error('photo')
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
                                    <label class="col-form-label">{{ getTranslation('telegram') }}</label>
                                    <input type="text" class="form-control"
                                           name="telegram"
                                           value="{{ old('telegram', $model->telegram ?? '') }}"
                                           placeholder="{{ getTranslation('telegram') }}">
                                    @error('telegram')
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
                                    <label class="col-form-label">{{ getTranslation('email') }}</label>
                                    <input type="email" class="form-control"
                                           name="email"
                                           value="{{ old('email', $model->email ?? '') }}"
                                           placeholder="{{ getTranslation('email') }}">
                                    @error('email')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-switch custom-control-right">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox"
                                               name="is_active"
                                               class="custom-control-input"
                                               value="1"
                                               {{ old('is_active', $model->is_active ?? 1) ? 'checked' : '' }}>
                                        <span class="custom-control-label">{{ getTranslation('is active') }}</span>
                                    </label>

                                    @error('is_active')
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