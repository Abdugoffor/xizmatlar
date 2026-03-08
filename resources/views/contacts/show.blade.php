@extends('layouts.admin')
@section('title', getTranslation('contact детали'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('contacts.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
            <a href="{{ route('contacts.edit', $model->id) }}" class="btn btn-outline-success ml-2">
                {{ getTranslation('Редактировать') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <th style="width:20%">{{ getTranslation('phone 1') }}</th>
                            <td>{{ $model->phone_1 }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('phone 2') }}</th>
                            <td>{{ $model->phone_2 }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('email 1') }}</th>
                            <td>{{ $model->email_1 }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('email 2') }}</th>
                            <td>{{ $model->email_2 }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%;vertical-align:top">{{ getTranslation('address') }}</th>
                            <td>
                                @if(is_array($model->address))
                                    <ul class="nav nav-tabs" id="show-tabs-address">
                                        @foreach(getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#show-address-{{ $lang->id }}"
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
                                                 id="show-address-{{ $lang->id }}">
                                                {!! nl2br(e($model->address[$lang->name] ?? $model->address['default'] ?? '')) !!}
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    {{ $model->address }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('tlegram') }}</th>
                            <td>{{ $model->tlegram }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('facebook') }}</th>
                            <td>{{ $model->facebook }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('instagram') }}</th>
                            <td>{{ $model->instagram }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('watsapp') }}</th>
                            <td>{{ $model->watsapp }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('linked') }}</th>
                            <td>{{ $model->linked }}</td>
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