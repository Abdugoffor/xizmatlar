@extends('layouts.admin')
@section('title', getTranslation('Создать bannerphoto'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('bannerphotos.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('bannerphotos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('bannerphoto') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                            <div class="form-group">
                                <label class="col-form-label">{{ getTranslation('bannerphotos_logo') }}</label>

                                <input type="file" class="form-control" name="logo">
                                @error('logo')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">{{ getTranslation('bannerphotos_service photo') }}</label>

                                <input type="file" class="form-control" name="service_photo">
                                @error('service_photo')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">{{ getTranslation('bannerphotos_blog photo') }}</label>

                                <input type="file" class="form-control" name="blog_photo">
                                @error('blog_photo')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">{{ getTranslation('bannerphotos_team photo') }}</label>

                                <input type="file" class="form-control" name="team_photo">
                                @error('team_photo')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">{{ getTranslation('bannerphotos_contact photo') }}</label>

                                <input type="file" class="form-control" name="contact_photo">
                                @error('contact_photo')
                                    <p style="color:red">{{ $message }}</p>
                                @enderror
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