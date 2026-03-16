@extends('layouts.admin')
@section('title', getTranslation('Создать aboutpageheader'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('aboutpageheaders.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('aboutpageheaders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('aboutpageheader') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('title') }}</label>
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
                                    <label class="form-label">{{ getTranslation('description') }}</label>
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
                                    <label class="form-label">{{ getTranslation('text') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-text">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-text-{{ $lang->id }}"
                                                    class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab">
                                                    {{ $lang->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content border border-top-0 p-2 mb-1">
                                        @foreach (getLanguage() as $lang)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                id="tab-text-{{ $lang->id }}">
                                                <input type="text" class="form-control mt-1" name="text[{{ $lang->name }}]"
                                                    value="{{ old('text.' . $lang->name) }}" placeholder="{{ $lang->name }}">
                                                @error('text.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('experience text') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-experience_text">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-experience_text-{{ $lang->id }}"
                                                    class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab">
                                                    {{ $lang->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content border border-top-0 p-2 mb-1">
                                        @foreach (getLanguage() as $lang)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                id="tab-experience_text-{{ $lang->id }}">
                                                <input type="text" class="form-control mt-1"
                                                    name="experience_text[{{ $lang->name }}]"
                                                    value="{{ old('experience_text.' . $lang->name) }}"
                                                    placeholder="{{ $lang->name }}">
                                                @error('experience_text.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('experience year') }}</label>
                                    <input type="date" class="form-control" name="experience_year"
                                        value="{{ old('experience_year') }}"
                                        placeholder="{{ getTranslation('experience year') }}">
                                    @error('experience_year')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('photo 1') }}</label>

                                    <input type="file" class="form-control" name="photo_1">
                                    @error('photo_1')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('photo 2') }}</label>

                                    <input type="file" class="form-control" name="photo_2">
                                    @error('photo_2')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('photo 3') }}</label>

                                    <input type="file" class="form-control" name="photo_3">
                                    @error('photo_3')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('photo 4') }}</label>

                                    <input type="file" class="form-control" name="photo_4">
                                    @error('photo_4')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('banner_photo') }}</label>

                                    <input type="file" class="form-control" name="banner_photo">
                                    @error('banner_photo')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('ceo name') }}</label>
                                    <input type="text" class="form-control" name="ceo_name" value="{{ old('ceo_name') }}"
                                        placeholder="{{ getTranslation('ceo name') }}">
                                    @error('ceo_name')
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