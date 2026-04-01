@extends('layouts.admin')
@section('title', getTranslation('Создать servicesection'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('servicesections.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('servicesections.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('servicesection') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('servicesections_title') }}</label>
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
                                    <label class="form-label">{{ getTranslation('servicesections_description') }}</label>
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
                                    <label class="form-label">{{ getTranslation('servicesections_label 1') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-label_1">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-label_1-{{ $lang->id }}"
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
                                                 id="tab-label_1-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="label_1[{{ $lang->name }}]"
                                                       value="{{ old('label_1.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('label_1.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('servicesections_text 1') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-text_1">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-text_1-{{ $lang->id }}"
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
                                                 id="tab-text_1-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="text_1[{{ $lang->name }}]"
                                                       value="{{ old('text_1.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('text_1.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('servicesections_photo 1') }}</label>

                                    <input type="file" class="form-control" name="photo_1">
                                    @error('photo_1')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('servicesections_label 2') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-label_2">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-label_2-{{ $lang->id }}"
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
                                                 id="tab-label_2-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="label_2[{{ $lang->name }}]"
                                                       value="{{ old('label_2.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('label_2.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('servicesections_text 2') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-text_2">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-text_2-{{ $lang->id }}"
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
                                                 id="tab-text_2-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="text_2[{{ $lang->name }}]"
                                                       value="{{ old('text_2.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('text_2.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('servicesections_photo 2') }}</label>

                                    <input type="file" class="form-control" name="servicesections_photo_2">
                                    @error('photo_2')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('label 3') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-label_3">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-label_3-{{ $lang->id }}"
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
                                                 id="tab-label_3-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="label_3[{{ $lang->name }}]"
                                                       value="{{ old('label_3.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('label_3.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('servicesections_text 3') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-text_3">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-text_3-{{ $lang->id }}"
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
                                                 id="tab-text_3-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="text_3[{{ $lang->name }}]"
                                                       value="{{ old('text_3.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('text_3.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('servicesections_photo 3') }}</label>

                                    <input type="file" class="form-control" name="photo_3">
                                    @error('photo_3')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('servicesections_main photo') }}</label>

                                    <input type="file" class="form-control" name="main_photo">
                                    @error('main_photo')
                                        <p style="color:red">{{ $message }}</p>
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