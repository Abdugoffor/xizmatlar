@extends('layouts.admin')
@section('title', getTranslation('AboutCompany'))
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
                            <a href="{{ route('aboutcompanies.create') }}" class="btn btn-teal">
                                <i class="icon-plus3 icon-1x mr-1"></i> {{ getTranslation('Добавить') }}
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                <th class="text-center" width="3%">№</th>
                                <th class="text-center">{{ getTranslation('section label') }}</th>
                                <th class="text-center">{{ getTranslation('title') }}</th>
                                <th class="text-center">{{ getTranslation('description') }}</th>
                                <th class="text-center">{{ getTranslation('experience year') }}</th>
                                <th class="text-center">{{ getTranslation('experience text') }}</th>
                                <th class="text-center">{{ getTranslation('experience photo') }}</th>
                                <th class="text-center">{{ getTranslation('block label1') }}</th>
                                <th class="text-center">{{ getTranslation('block title1') }}</th>
                                <th class="text-center">{{ getTranslation('block photo1') }}</th>
                                <th class="text-center">{{ getTranslation('block label2') }}</th>
                                <th class="text-center">{{ getTranslation('block title2') }}</th>
                                <th class="text-center">{{ getTranslation('block photo2') }}</th>
                                <th class="text-center">{{ getTranslation('founder name') }}</th>
                                <th class="text-center">{{ getTranslation('founder position') }}</th>
                                <th class="text-center">{{ getTranslation('founder photo') }}</th>
                                <th class="text-center">{{ getTranslation('main photo') }}</th>

                                    <th class="text-center">{{ getTranslation('Действия') }}</th>
                                </tr>
                                <form action="{{ route('aboutcompanies.index') }}" method="get">
                                    <tr>
                                <th class="text-center"></th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="section_label"
                                           placeholder="{{ getTranslation('section label') }}"
                                           value="{{ old('section_label', request('section_label')) }}">
                                </th>
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
                                <th class="text-center">
                                    <input type="text" class="form-control" name="experience_year"
                                           placeholder="{{ getTranslation('experience year') }}"
                                           value="{{ old('experience_year', request('experience_year')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="experience_text"
                                           placeholder="{{ getTranslation('experience text') }}"
                                           value="{{ old('experience_text', request('experience_text')) }}">
                                </th>
                                <th class="text-center"></th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="block_label1"
                                           placeholder="{{ getTranslation('block label1') }}"
                                           value="{{ old('block_label1', request('block_label1')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="block_title1"
                                           placeholder="{{ getTranslation('block title1') }}"
                                           value="{{ old('block_title1', request('block_title1')) }}">
                                </th>
                                <th class="text-center"></th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="block_label2"
                                           placeholder="{{ getTranslation('block label2') }}"
                                           value="{{ old('block_label2', request('block_label2')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="block_title2"
                                           placeholder="{{ getTranslation('block title2') }}"
                                           value="{{ old('block_title2', request('block_title2')) }}">
                                </th>
                                <th class="text-center"></th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="founder_name"
                                           placeholder="{{ getTranslation('founder name') }}"
                                           value="{{ old('founder_name', request('founder_name')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="founder_position"
                                           placeholder="{{ getTranslation('founder position') }}"
                                           value="{{ old('founder_position', request('founder_position')) }}">
                                </th>
                                <th class="text-center"></th>
                                <th class="text-center"></th>

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
                            <td>{{ getLocale($model->section_label) }}</td>
                            <td>{{ getLocale($model->title) }}</td>
                            <td>{{ getLocale($model->description) }}</td>
                            <td>{{ $model->experience_year }}</td>
                            <td>{{ getLocale($model->experience_text) }}</td>
                            <td>@if($model->experience_photo) <a href="{{ asset($model->experience_photo) }}" target="_blank">{{ getTranslation('Open file') }}</a> @else - @endif</td>
                            <td>{{ getLocale($model->block_label1) }}</td>
                            <td>{{ getLocale($model->block_title1) }}</td>
                            <td>@if($model->block_photo1) <a href="{{ asset($model->block_photo1) }}" target="_blank">{{ getTranslation('Open file') }}</a> @else - @endif</td>
                            <td>{{ getLocale($model->block_label2) }}</td>
                            <td>{{ getLocale($model->block_title2) }}</td>
                            <td>@if($model->block_photo2) <a href="{{ asset($model->block_photo2) }}" target="_blank">{{ getTranslation('Open file') }}</a> @else - @endif</td>
                            <td>{{ getLocale($model->founder_name) }}</td>
                            <td>{{ getLocale($model->founder_position) }}</td>
                            <td>@if($model->founder_photo) <a href="{{ asset($model->founder_photo) }}" target="_blank">{{ getTranslation('Open file') }}</a> @else - @endif</td>
                            <td>@if($model->main_photo) <a href="{{ asset($model->main_photo) }}" target="_blank">{{ getTranslation('Open file') }}</a> @else - @endif</td>

                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('aboutcompanies.show', $model->id) }}" class="btn btn-outline-info">
                                                    <i class="icon-eye8"></i>
                                                </a>
                                                <a href="{{ route('aboutcompanies.edit', $model->id) }}" class="btn btn-outline-success ml-2">
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
                                                        <form action="{{ route('aboutcompanies.destroy', $model->id) }}" method="post">
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