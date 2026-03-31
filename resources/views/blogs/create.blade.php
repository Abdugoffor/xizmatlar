@extends('layouts.admin')
@section('title', getTranslation('Создать blog'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>
        @if (session('notification'))
            <div class="alert bg-teal text-white alert-rounded alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="font-weight-semibold">{{ session('notification') }}</span>
            </div>
        @endif
        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('blog') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('blogs_title') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-title">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-title-{{ $lang->id }}"
                                                    class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab">
                                                    {{ $lang->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content border border-top-0 p-2 mb-1">
                                        @foreach (getLanguage() as $lang)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                id="tab-title-{{ $lang->id }}">
                                                <input type="text" class="form-control mt-1" name="title[{{ $lang->name }}]"
                                                    value="{{ old('title.' . $lang->name) }}" placeholder="{{ $lang->name }}">
                                                @error('title.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('blogs_description') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-description">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-description-{{ $lang->id }}"
                                                    class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab">
                                                    {{ $lang->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content border border-top-0 p-2 mb-1">
                                        @foreach (getLanguage() as $lang)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                id="tab-description-{{ $lang->id }}">
                                                <input type="text" class="form-control mt-1"
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
                                    <label class="col-form-label">{{ getTranslation('blogs_photo') }}</label>

                                    <input type="file" class="form-control" name="photo">
                                    @error('photo')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('blogs_card_photo') }}</label>

                                    <input type="file" class="form-control" name="card_photo">
                                    @error('card_photo')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('blogs_content') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-content">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-content-{{ $lang->id }}"
                                                    class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab">
                                                    {{ $lang->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content border border-top-0 p-2 mb-1">
                                        @foreach (getLanguage() as $lang)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                id="tab-content-{{ $lang->id }}">

                                                <textarea class="form-control summernote mt-1" name="content[{{ $lang->name }}]"
                                                    placeholder="{{ $lang->name }}">{{ old('content.' . $lang->name) }}</textarea>

                                                @error('content.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('blogs_video link') }}</label>
                                    <input type="text" class="form-control" name="video_link"
                                        value="{{ old('video_link') }}" placeholder="{{ getTranslation('blogs_video link') }}">
                                    @error('video_link')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('blogs_footer text') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-footer_text">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-footer_text-{{ $lang->id }}"
                                                    class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab">
                                                    {{ $lang->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content border border-top-0 p-2 mb-1">
                                        @foreach (getLanguage() as $lang)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                id="tab-footer_text-{{ $lang->id }}">
                                                <input type="text" class="form-control mt-1"
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
                                    <label class="col-form-label">{{ getTranslation('blogs_date') }}</label>
                                    <input type="date" class="form-control" name="date" value="{{ old('date') }}"
                                        placeholder="{{ getTranslation('blogs_date') }}">
                                    @error('date')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox" name="is_active" class="custom-control-input" id="is_active"
                                            value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_active">
                                            {{ getTranslation('blogs_is active') }}
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