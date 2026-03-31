@extends('layouts.admin')
@section('title', getTranslation('Создать client'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('client') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                        <label class="col-form-label">{{ getTranslation('clients_title') }}</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title') }}" placeholder="{{ getTranslation('clients_title') }}">
                                        @error('title')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('clients_photo') }}</label>

                                    <input type="file" class="form-control" name="photo">
                                    @error('photo')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox" name="is_active" class="custom-control-input" id="is_active"
                                            value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_active">
                                            {{ getTranslation('clients_is active') }}
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