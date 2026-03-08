@extends('layouts.admin')
@section('title', getTranslation('Team'))
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xl-12">

                @if (session('notification'))
                    <div class="alert bg-teal text-white alert-rounded alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span class="font-weight-semibold">{{ session('notification') }}</span>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body d-lg-flex align-items-lg-center justify-content-lg-between flex-lg-wrap">
                        <div class="d-flex align-items-center mb-3 mb-lg-0"></div>
                        <div>
                            <a href="{{ route('teams.create') }}" class="btn btn-teal">
                                <i class="icon-plus3 icon-1x mr-1"></i> {{ getTranslation('Добавить') }}
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                <th class="text-center" width="3%">№</th>
                                <th class="text-center">{{ getTranslation('name') }}</th>
                                <th class="text-center">{{ getTranslation('position') }}</th>
                                <th class="text-center">{{ getTranslation('photo') }}</th>
                                <th class="text-center">{{ getTranslation('linked') }}</th>
                                <th class="text-center">{{ getTranslation('telegram') }}</th>
                                <th class="text-center">{{ getTranslation('watsapp') }}</th>
                                <th class="text-center">{{ getTranslation('facebook') }}</th>
                                <th class="text-center">{{ getTranslation('email') }}</th>
                                <th class="text-center">{{ getTranslation('is active') }}</th>

                                    <th class="text-center">{{ getTranslation('Действия') }}</th>
                                </tr>
                                <form action="{{ route('teams.index') }}" method="get">
                                    <tr>
                                <th class="text-center"></th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="name"
                                           placeholder="{{ getTranslation('name') }}"
                                           value="{{ old('name', request('name')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="position"
                                           placeholder="{{ getTranslation('position') }}"
                                           value="{{ old('position', request('position')) }}">
                                </th>
                                <th class="text-center"></th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="linked"
                                           placeholder="{{ getTranslation('linked') }}"
                                           value="{{ old('linked', request('linked')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="telegram"
                                           placeholder="{{ getTranslation('telegram') }}"
                                           value="{{ old('telegram', request('telegram')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="watsapp"
                                           placeholder="{{ getTranslation('watsapp') }}"
                                           value="{{ old('watsapp', request('watsapp')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="facebook"
                                           placeholder="{{ getTranslation('facebook') }}"
                                           value="{{ old('facebook', request('facebook')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="email"
                                           placeholder="{{ getTranslation('email') }}"
                                           value="{{ old('email', request('email')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="is_active"
                                           placeholder="{{ getTranslation('is active') }}"
                                           value="{{ old('is_active', request('is_active')) }}">
                                </th>

                                        <th class="text-center">
                                            <button class="btn btn-teal">{{ getTranslation('Поиск') }}</button>
                                        </th>
                                    </tr>
                                </form>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}</td>
                            <td>{{ getLocale($model->name) }}</td>
                            <td>{{ getLocale($model->position) }}</td>
                            <td>@if($model->photo) <a href="{{ asset($model->photo) }}" target="_blank">{{ getTranslation('Open file') }}</a> @else - @endif</td>
                            <td>{{ $model->linked }}</td>
                            <td>{{ $model->telegram }}</td>
                            <td>{{ $model->watsapp }}</td>
                            <td>{{ $model->facebook }}</td>
                            <td>{{ $model->email }}</td>
                            <td>{{ $model->is_active ? '1' : '0' }}</td>

                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('teams.show', $model->id) }}" class="btn btn-outline-info">
                                                    <i class="icon-eye8"></i>
                                                </a>
                                                <a href="{{ route('teams.edit', $model->id) }}" class="btn btn-outline-success ml-2">
                                                    <i class="icon-pencil3"></i>
                                                </a>
                                                <button type="button" class="btn btn-outline-danger ml-2" data-toggle="modal" data-target="#delete_modal_{{ $model->id }}">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </div>

                                            <div id="delete_modal_{{ $model->id }}" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="{{ route('teams.destroy', $model->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-body">
                                                                <h3 class="text-center">{{ getTranslation('Вы уверены, что хотите удалить?') }}</h3>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-center pb-4">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ getTranslation('Закрыть') }}</button>
                                                                <button type="submit" class="btn btn-danger">{{ getTranslation('Подтвердить') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{ $models->links() }}
            </div>
        </div>
    </div>
@endsection