@extends('layouts.admin')
@section('title', getTranslation('Редактировать service'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('services.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('service') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('services_title') }}</label>
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
                                                       value="{{ old('title.' . $lang->name, is_array($model->title) ? ($model->title[$lang->name] ?? $model->title['default'] ?? '') : '') }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('title.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('services_description') }}</label>
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
                                                       value="{{ old('description.' . $lang->name, is_array($model->description) ? ($model->description[$lang->name] ?? $model->description['default'] ?? '') : '') }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('description.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('services_cart photo') }}</label>
                                    @if(!empty($model->cart_photo))
                                        <div class="mb-2">
                                            <a href="{{ asset($model->cart_photo) }}" target="_blank">
                                                {{ getTranslation('Current file') }}
                                            </a>
                                        </div>

                                        @php
                                            $extension = strtolower(pathinfo($model->cart_photo, PATHINFO_EXTENSION));
                                        @endphp

                                        @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                            <div class="mb-2">
                                                <img src="{{ asset($model->cart_photo) }}" alt="cart_photo" style="max-height:120px; border-radius:8px;">
                                            </div>
                                        @endif
                                    @endif
                                    <input type="file" class="form-control" name="cart_photo">
                                    @error('cart_photo')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('services_header photo') }}</label>
                                    @if(!empty($model->header_photo))
                                        <div class="mb-2">
                                            <a href="{{ asset($model->header_photo) }}" target="_blank">
                                                {{ getTranslation('Current file') }}
                                            </a>
                                        </div>

                                        @php
                                            $extension = strtolower(pathinfo($model->header_photo, PATHINFO_EXTENSION));
                                        @endphp

                                        @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                            <div class="mb-2">
                                                <img src="{{ asset($model->header_photo) }}" alt="header_photo" style="max-height:120px; border-radius:8px;">
                                            </div>
                                        @endif
                                    @endif
                                    <input type="file" class="form-control" name="header_photo">
                                    @error('header_photo')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('services_content') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-content">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-content-{{ $lang->id }}"
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
                                                id="tab-content-{{ $lang->id }}">

                                                <textarea
                                                    class="form-control summernote mt-1"
                                                    name="content[{{ $lang->name }}]"
                                                    placeholder="{{ $lang->name }}"
                                                >{{ old('content.' . $lang->name, is_array($model->content) ? ($model->content[$lang->name] ?? $model->content['default'] ?? '') : '') }}</textarea>

                                                @error('content.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('services_video link') }}</label>
                                    <input type="text" class="form-control"
                                           name="video_link"
                                           value="{{ old('video_link', $model->video_link ?? '') }}"
                                           placeholder="{{ getTranslation('services_video link') }}">
                                    @error('video_link')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('services_footer text') }}</label>
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
                                                       value="{{ old('footer_text.' . $lang->name, is_array($model->footer_text) ? ($model->footer_text[$lang->name] ?? $model->footer_text['default'] ?? '') : '') }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('footer_text.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-switch custom-control-right">
                                        <input type="hidden" name="is_main" value="0">
                                        <input type="checkbox"
                                               name="is_main"
                                               class="custom-control-input"
                                               value="1"
                                               {{ old('is_main', $model->is_main ?? 1) ? 'checked' : '' }}>
                                        <span class="custom-control-label">{{ getTranslation('is main') }}</span>
                                    </label>

                                    @error('is_main')
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