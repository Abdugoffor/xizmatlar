@extends('layouts.admin')
@section('title', getTranslation('Создать team'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('teams.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('team') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('teams_name') }}</label>
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
                                                       value="{{ old('name.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('name.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('teams_position') }}</label>
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
                                                       value="{{ old('position.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('position.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('teams_photo') }}</label>

                                    <input type="file" class="form-control" name="photo">
                                    @error('photo')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('teams_linked') }}</label>
                                    <input type="text" class="form-control"
                                           name="linked"
                                           value="{{ old('linked') }}"
                                           placeholder="{{ getTranslation('teams_linked') }}">
                                    @error('linked')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('teams_telegram') }}</label>
                                    <input type="text" class="form-control"
                                           name="telegram"
                                           value="{{ old('telegram') }}"
                                           placeholder="{{ getTranslation('teams_telegram') }}">
                                    @error('telegram')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('teams_watsapp') }}</label>
                                    <input type="text" class="form-control"
                                           name="watsapp"
                                           value="{{ old('watsapp') }}"
                                           placeholder="{{ getTranslation('teams_watsapp') }}">
                                    @error('watsapp')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('teams_facebook') }}</label>
                                    <input type="text" class="form-control"
                                           name="facebook"
                                           value="{{ old('facebook') }}"
                                           placeholder="{{ getTranslation('teams_facebook') }}">
                                    @error('facebook')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('teams_email') }}</label>
                                    <input type="email" class="form-control"
                                           name="email"
                                           value="{{ old('email') }}"
                                           placeholder="{{ getTranslation('teams_email') }}">
                                    @error('email')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox"
                                               name="is_active"
                                               class="custom-control-input"
                                               id="is_active"
                                               value="1"
                                               {{ old('is_active', 1) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_active">
                                            {{ getTranslation('is active') }}
                                        </label>
                                    </div>

                                    @error('is_active')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </fieldset>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">{{ getTranslation('Добавить') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection