@extends('layouts.admin')
@section('title', getTranslation('Service'))
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
                            <a href="{{ route('services.create') }}" class="btn btn-teal">
                                <i class="icon-plus3 icon-1x mr-1"></i> {{ getTranslation('Добавить') }}
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" width="3%">№</th>
                                    <th class="text-center">{{ getTranslation('title') }}</th>
                                    <th class="text-center">{{ getTranslation('description') }}</th>
                                    <th class="text-center">{{ getTranslation('cart photo') }}</th>
                                    <th class="text-center">{{ getTranslation('header photo') }}</th>
                                    <th class="text-center">{{ getTranslation('is main') }}</th>
                                    <th class="text-center">{{ getTranslation('is active') }}</th>

                                    <th class="text-center">{{ getTranslation('Действия') }}</th>
                                </tr>
                                <form action="{{ route('services.index') }}" method="get">
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="title"
                                                placeholder="{{ getTranslation('title') }}"
                                                value="{{ old('title', request('title')) }}">
                                        </th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="description"
                                                placeholder="{{ getTranslation('description') }}"
                                                value="{{ old('description', request('description')) }}">
                                        </th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="is_main"
                                                placeholder="{{ getTranslation('is main') }}"
                                                value="{{ old('is_main', request('is_main')) }}">
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
                                        <td>{{ getLocale($model->title) }}</td>
                                        <td>{{ getLocale($model->description) }}</td>
                                        <td>@if($model->cart_photo) <a href="{{ asset($model->cart_photo) }}"
                                        target="_blank">{{ getTranslation('Open file') }}</a> @else - @endif</td>
                                        <td>@if($model->header_photo) <a href="{{ asset($model->header_photo) }}"
                                        target="_blank">{{ getTranslation('Open file') }}</a> @else - @endif</td>
                                        <td>
                                            @if($model->is_main)
                                                <span class="badge badge-success badge-pill">Main</span>
                                            @else
                                                <span class="badge badge-danger badge-pill">Not main</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($model->is_active)
                                                <span class="badge badge-success badge-pill">Active</span>
                                            @else
                                                <span class="badge badge-danger badge-pill">Inactive</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('services.show', $model->id) }}" class="btn btn-outline-info">
                                                    <i class="icon-eye8"></i>
                                                </a>
                                                <a href="{{ route('services.edit', $model->id) }}"
                                                    class="btn btn-outline-success ml-2">
                                                    <i class="icon-pencil3"></i>
                                                </a>
                                                <button type="button" class="btn btn-outline-danger ml-2" data-toggle="modal"
                                                    data-target="#delete_modal_{{ $model->id }}">
                                                    <i class="icon-trash"></i>
                                                </button>
                                                <a target="_blank" href="{{ route('history.show', ['model' => 'Service', 'id' => $model->id]) }}"
                                                    class="btn btn-outline-warning ml-2">
                                                    <i class="icon-history"></i>
                                                </a>
                                            </div>

                                            <div id="delete_modal_{{ $model->id }}" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="{{ route('services.destroy', $model->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-body">
                                                                <h3 class="text-center">
                                                                    {{ getTranslation('Вы уверены, что хотите удалить?') }}
                                                                </h3>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-center pb-4">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ getTranslation('Закрыть') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">{{ getTranslation('Подтвердить') }}</button>
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