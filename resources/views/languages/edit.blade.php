@extends('layouts.admin')
@section('title', getTranslation('Редактировать language'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('languages.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('languages.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('language') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('name') }}</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $model->name ?? '') }}"
                                        placeholder="{{ getTranslation('name') }}">
                                    @error('name')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label d-block">{{ getTranslation('is active') }}</label>

                                    <label class="custom-control custom-switch custom-control-right">
                                        <input type="hidden" name="is_active" value="0">

                                        <input type="checkbox" name="is_active" class="custom-control-input" value="1"
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
