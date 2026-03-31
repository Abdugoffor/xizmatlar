@extends('layouts.admin')
@section('title', getTranslation('Редактировать client'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('clients.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('client') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                        <label class="col-form-label">{{ getTranslation('clients_title') }}</label>
                                        @php
                                            $title = is_array($model->title ?? null)
                                                ? ($model->title['uz'] ?? '')
                                                : ($model->title ?? '');
                                        @endphp

                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title', $title) }}"
                                            placeholder="{{ getTranslation('clients_title') }}">
                                        @error('title')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('clients_photo') }}</label>
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
                                    <label class="custom-control custom-switch custom-control-right">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox"
                                               name="is_active"
                                               class="custom-control-input"
                                               value="1"
                                               {{ old('is_active', $model->is_active ?? 1) ? 'checked' : '' }}>
                                        <span class="custom-control-label">{{ getTranslation('clients_is active') }}</span>
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