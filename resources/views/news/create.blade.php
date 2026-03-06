@extends('layouts.admin')
@section('title', getTranslation('Создать news'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('news.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('news') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('title') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-title">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-title-{{ $lang->id }}"
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
                                                 id="tab-title-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="title[{{ $lang->name }}]"
                                                       value="{{ old('title.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('title.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('description') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-description">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-description-{{ $lang->id }}"
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
                                                 id="tab-description-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="description[{{ $lang->name }}]"
                                                       value="{{ old('description.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('description.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('text') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-text">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-text-{{ $lang->id }}"
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
                                                 id="tab-text-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="text[{{ $lang->name }}]"
                                                       value="{{ old('text.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('text.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('footer text') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-footer_text">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-footer_text-{{ $lang->id }}"
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
                                                 id="tab-footer_text-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="footer_text[{{ $lang->name }}]"
                                                       value="{{ old('footer_text.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('footer_text.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('photo') }}</label>
                                    <input type="text" class="form-control"
                                           name="photo"
                                           value="{{ old('photo') }}"
                                           placeholder="{{ getTranslation('photo') }}">
                                    @error('photo')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('video') }}</label>
                                    <input type="text" class="form-control"
                                           name="video"
                                           value="{{ old('video') }}"
                                           placeholder="{{ getTranslation('video') }}">
                                    @error('video')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('date') }}</label>
                                    <input type="date" class="form-control"
                                           name="date"
                                           value="{{ old('date') }}"
                                           placeholder="{{ getTranslation('date') }}">
                                    @error('date')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('is main') }}</label>

                                    <div class="custom-control custom-switch">
                                        <input type="hidden" name="is_main" value="0">
                                        <input type="checkbox"
                                               name="is_main"
                                               class="custom-control-input"
                                               id="is_main"
                                               value="1"
                                               {{ old('is_main', 1) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_main">
                                            {{ getTranslation('status') }}
                                        </label>
                                    </div>

                                    @error('is_main')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('is active') }}</label>

                                    <div class="custom-control custom-switch">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox"
                                               name="is_active"
                                               class="custom-control-input"
                                               id="is_active"
                                               value="1"
                                               {{ old('is_active', 1) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_active">
                                            {{ getTranslation('status') }}
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