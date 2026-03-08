@extends('layouts.admin')
@section('title', getTranslation('team детали'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('teams.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
            <a href="{{ route('teams.edit', $model->id) }}" class="btn btn-outline-success ml-2">
                {{ getTranslation('Редактировать') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>

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
                            <th style="width:20%;vertical-align:top">{{ getTranslation('position') }}</th>
                            <td>
                                @if(is_array($model->position))
                                    <ul class="nav nav-tabs" id="show-tabs-position">
                                        @foreach(getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#show-position-{{ $lang->id }}"
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
                                                 id="show-position-{{ $lang->id }}">
                                                {!! nl2br(e($model->position[$lang->name] ?? $model->position['default'] ?? '')) !!}
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    {{ $model->position }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('photo') }}</th>
                            <td>
                                @if($model->photo)
                                    <a href="{{ asset($model->photo) }}" target="_blank">
                                        {{ getTranslation('Open file') }}
                                    </a>

                                    @php
                                        $extension = strtolower(pathinfo($model->photo, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <div class="mt-2">
                                            <img src="{{ asset($model->photo) }}" alt="photo" style="max-height:150px; border-radius:8px;">
                                        </div>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('linked') }}</th>
                            <td>{{ $model->linked }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('telegram') }}</th>
                            <td>{{ $model->telegram }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('watsapp') }}</th>
                            <td>{{ $model->watsapp }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('facebook') }}</th>
                            <td>{{ $model->facebook }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('email') }}</th>
                            <td>{{ $model->email }}</td>
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