@extends('layouts.admin')
@section('title', getTranslation('bannerphoto детали'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('bannerphotos.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
            <a href="{{ route('bannerphotos.edit', $model->id) }}" class="btn btn-outline-success ml-2">
                {{ getTranslation('Редактировать') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <th style="width:20%">{{ getTranslation('service photo') }}</th>
                            <td>
                                @if($model->service_photo)
                                    <a href="{{ asset($model->service_photo) }}" target="_blank">
                                        {{ getTranslation('Open file') }}
                                    </a>

                                    @php
                                        $extension = strtolower(pathinfo($model->service_photo, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <div class="mt-2">
                                            <img src="{{ asset($model->service_photo) }}" alt="service_photo" style="max-height:150px; border-radius:8px;">
                                        </div>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('blog photo') }}</th>
                            <td>
                                @if($model->blog_photo)
                                    <a href="{{ asset($model->blog_photo) }}" target="_blank">
                                        {{ getTranslation('Open file') }}
                                    </a>

                                    @php
                                        $extension = strtolower(pathinfo($model->blog_photo, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <div class="mt-2">
                                            <img src="{{ asset($model->blog_photo) }}" alt="blog_photo" style="max-height:150px; border-radius:8px;">
                                        </div>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('team photo') }}</th>
                            <td>
                                @if($model->team_photo)
                                    <a href="{{ asset($model->team_photo) }}" target="_blank">
                                        {{ getTranslation('Open file') }}
                                    </a>

                                    @php
                                        $extension = strtolower(pathinfo($model->team_photo, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <div class="mt-2">
                                            <img src="{{ asset($model->team_photo) }}" alt="team_photo" style="max-height:150px; border-radius:8px;">
                                        </div>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('contact photo') }}</th>
                            <td>
                                @if($model->contact_photo)
                                    <a href="{{ asset($model->contact_photo) }}" target="_blank">
                                        {{ getTranslation('Open file') }}
                                    </a>

                                    @php
                                        $extension = strtolower(pathinfo($model->contact_photo, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <div class="mt-2">
                                            <img src="{{ asset($model->contact_photo) }}" alt="contact_photo" style="max-height:150px; border-radius:8px;">
                                        </div>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th style="width:20%">{{ getTranslation('Создан') }}</th>
                            <td>{{ $model->created_at->format('d-m-Y, H:i') }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('Обновлён') }}</th>
                            <td>{{ $model->updated_at->format('d-m-Y, H:i') }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection