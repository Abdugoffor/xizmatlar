@extends('layouts.admin')
@section('title', getTranslation('sertificate детали'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('sertificates.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
            <a href="{{ route('sertificates.edit', $model->id) }}" class="btn btn-outline-success ml-2">
                {{ getTranslation('Редактировать') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <th style="width:20%;vertical-align:top">{{ getTranslation('title') }}</th>
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
                            <th style="width:20%">{{ getTranslation('file') }}</th>
                            <td>
                                @if($model->file)
                                    <a href="{{ asset($model->file) }}" target="_blank">
                                        {{ getTranslation('Open file') }}
                                    </a>

                                    @php
                                        $extension = strtolower(pathinfo($model->file, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <div class="mt-2">
                                            <img src="{{ asset($model->file) }}" alt="file" style="max-height:150px; border-radius:8px;">
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