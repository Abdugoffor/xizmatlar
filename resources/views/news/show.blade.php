@extends('layouts.admin')
@section('title', getTranslation('news детали'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('news.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
            <a href="{{ route('news.edit', $model->id) }}" class="btn btn-outline-success ml-2">
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
                            <th style="width:20%;vertical-align:top">{{ getTranslation('footer text') }}</th>
                            <td>
                                @if(is_array($model->footer_text))
                                    <ul class="nav nav-tabs" id="show-tabs-footer_text">
                                        @foreach(getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#show-footer_text-{{ $lang->id }}"
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
                                                 id="show-footer_text-{{ $lang->id }}">
                                                {!! nl2br(e($model->footer_text[$lang->name] ?? $model->footer_text['default'] ?? '')) !!}
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    {{ $model->footer_text }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('photo') }}</th>
                            <td>{{ $model->photo }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('video') }}</th>
                            <td>{{ $model->video }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('date') }}</th>
                            <td>{{ $model->date }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('is main') }}</th>
                            <td>{{ $model->is_main ? getTranslation('Активный') : getTranslation('Неактивный') }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('is active') }}</th>
                            <td>{{ $model->is_active ? getTranslation('Активный') : getTranslation('Неактивный') }}</td>
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