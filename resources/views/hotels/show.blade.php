@extends('layouts.admin')
@section('title', getTranslation('hotel детали'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('hotels.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
            <a href="{{ route('hotels.edit', $model->id) }}" class="btn btn-outline-success ml-2">
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
                            <th style="width:20%;vertical-align:top">{{ getTranslation('description') }}</th>
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
                            <th style="width:20%;vertical-align:top">{{ getTranslation('text') }}</th>
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
                            <th style="width:20%">{{ getTranslation('latitude') }}</th>
                            <td>{{ $model->latitude }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('longitude') }}</th>
                            <td>{{ $model->longitude }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('is active') }}</th>
                            <td>{{ $model->is_active }}</td>
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