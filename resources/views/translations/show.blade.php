@extends('layouts.admin')
@section('title', getTranslation('translation детали'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('translations.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
            <a href="{{ route('translations.edit', $model->id) }}" class="btn btn-outline-success ml-2">
                {{ getTranslation('Редактировать') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <th style="width:20%">{{ getTranslation('type') }}</th>
                            <td>{{ $model->type }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('slug') }}</th>
                            <td>{{ $model->slug }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%;vertical-align:top">{{ getTranslation('name') }}</th>
                            <td>
                                @if(is_array($model->name))
                                    <ul class="nav nav-tabs" id="show-tabs-name">
                                        @foreach(getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#show-name-{{ $lang->id }}"
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
                                                 id="show-name-{{ $lang->id }}">
                                                {!! nl2br(e($model->name[$lang->name] ?? $model->name['default'] ?? '')) !!}
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    {{ $model->name }}
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