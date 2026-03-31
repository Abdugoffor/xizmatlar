@extends('layouts.admin')
@section('title', getTranslation('aboutpageheader детали'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('aboutpageheaders.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
            <a href="{{ route('aboutpageheaders.edit', $model->id) }}" class="btn btn-outline-success ml-2">
                {{ getTranslation('Редактировать') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <th style="width:20%;vertical-align:top">{{ getTranslation('aboutpageheaders_title') }}</th>
                            <td>
                                @if(is_array($model->title))
                                    <ul class="nav nav-tabs" id="show-tabs-title">
                                        @foreach(getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#show-title-{{ $lang->id }}"
                                                   class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                   data-toggle="tab">
                                                    {{ $lang->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content border border-top-0 p-2">
                                        @foreach(getLanguage() as $lang)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                 id="show-title-{{ $lang->id }}">
                                                {!! nl2br(e($model->title[$lang->name] ?? $model->title['default'] ?? '')) !!}
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    {{ $model->title }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%;vertical-align:top">{{ getTranslation('aboutpageheaders_description') }}</th>
                            <td>
                                @if(is_array($model->description))
                                    <ul class="nav nav-tabs" id="show-tabs-description">
                                        @foreach(getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#show-description-{{ $lang->id }}"
                                                   class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                   data-toggle="tab">
                                                    {{ $lang->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content border border-top-0 p-2">
                                        @foreach(getLanguage() as $lang)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                 id="show-description-{{ $lang->id }}">
                                                {!! nl2br(e($model->description[$lang->name] ?? $model->description['default'] ?? '')) !!}
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    {{ $model->description }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%;vertical-align:top">{{ getTranslation('aboutpageheaders_text') }}</th>
                            <td>
                                @if(is_array($model->text))
                                    <ul class="nav nav-tabs" id="show-tabs-text">
                                        @foreach(getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#show-text-{{ $lang->id }}"
                                                   class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                   data-toggle="tab">
                                                    {{ $lang->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content border border-top-0 p-2">
                                        @foreach(getLanguage() as $lang)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                 id="show-text-{{ $lang->id }}">
                                                {!! nl2br(e($model->text[$lang->name] ?? $model->text['default'] ?? '')) !!}
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    {{ $model->text }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%;vertical-align:top">{{ getTranslation('aboutpageheaders_experience text') }}</th>
                            <td>
                                @if(is_array($model->experience_text))
                                    <ul class="nav nav-tabs" id="show-tabs-experience_text">
                                        @foreach(getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#show-experience_text-{{ $lang->id }}"
                                                   class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                   data-toggle="tab">
                                                    {{ $lang->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content border border-top-0 p-2">
                                        @foreach(getLanguage() as $lang)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                 id="show-experience_text-{{ $lang->id }}">
                                                {!! nl2br(e($model->experience_text[$lang->name] ?? $model->experience_text['default'] ?? '')) !!}
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    {{ $model->experience_text }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('aboutpageheaders_experience year') }}</th>
                            <td>{{ $model->experience_year }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('aboutpageheaders_photo 1') }}</th>
                            <td>
                                @if($model->photo_1)
                                    <a href="{{ asset($model->photo_1) }}" target="_blank">
                                        {{ getTranslation('Open file') }}
                                    </a>

                                    @php
                                        $extension = strtolower(pathinfo($model->photo_1, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <div class="mt-2">
                                            <img src="{{ asset($model->photo_1) }}" alt="photo_1" style="max-height:150px; border-radius:8px;">
                                        </div>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('aboutpageheaders_photo 2') }}</th>
                            <td>
                                @if($model->photo_2)
                                    <a href="{{ asset($model->photo_2) }}" target="_blank">
                                        {{ getTranslation('Open file') }}
                                    </a>

                                    @php
                                        $extension = strtolower(pathinfo($model->photo_2, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <div class="mt-2">
                                            <img src="{{ asset($model->photo_2) }}" alt="photo_2" style="max-height:150px; border-radius:8px;">
                                        </div>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('aboutpageheaders_photo 3') }}</th>
                            <td>
                                @if($model->photo_3)
                                    <a href="{{ asset($model->photo_3) }}" target="_blank">
                                        {{ getTranslation('Open file') }}
                                    </a>

                                    @php
                                        $extension = strtolower(pathinfo($model->photo_3, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <div class="mt-2">
                                            <img src="{{ asset($model->photo_3) }}" alt="photo_3" style="max-height:150px; border-radius:8px;">
                                        </div>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('aboutpageheaders_photo 4') }}</th>
                            <td>
                                @if($model->photo_4)
                                    <a href="{{ asset($model->photo_4) }}" target="_blank">
                                        {{ getTranslation('Open file') }}
                                    </a>

                                    @php
                                        $extension = strtolower(pathinfo($model->photo_4, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <div class="mt-2">
                                            <img src="{{ asset($model->photo_4) }}" alt="photo_4" style="max-height:150px; border-radius:8px;">
                                        </div>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('aboutpageheaders_banner_photo') }}</th>
                            <td>
                                @if($model->banner_photo)
                                    <a href="{{ asset($model->banner_photo) }}" target="_blank">
                                        {{ getTranslation('Open file') }}
                                    </a>

                                    @php
                                        $extension = strtolower(pathinfo($model->banner_photo, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <div class="mt-2">
                                            <img src="{{ asset($model->banner_photo) }}" alt="banner_photo" style="max-height:150px; border-radius:8px;">
                                        </div>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('aboutpageheaders_ceo name') }}</th>
                            <td>{{ $model->ceo_name }}</td>
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