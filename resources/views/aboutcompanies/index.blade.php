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

                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" width="3%">№</th>
                                    <th class="text-center">{{ getTranslation('section label') }}</th>
                                    <th class="text-center">{{ getTranslation('title') }}</th>
                                    <th class="text-center">{{ getTranslation('main photo') }}</th>

                                    <th class="text-center">{{ getTranslation('Действия') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}</td>
                                        <td>{{ getLocale($model->section_label) }}</td>
                                        <td>{{ getLocale($model->title) }}</td>
                                        
                                        <td>@if($model->main_photo) <a href="{{ asset($model->main_photo) }}"
                                        target="_blank">{{ getTranslation('Open file') }}</a> @else - @endif</td>

                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('aboutcompanies.show', $model->id) }}"
                                                    class="btn btn-outline-info">
                                                    <i class="icon-eye8"></i>
                                                </a>
                                                <a href="{{ route('aboutcompanies.edit', $model->id) }}"
                                                    class="btn btn-outline-success ml-2">
                                                    <i class="icon-pencil3"></i>
                                                </a>
                                                <a target="_blank" href="{{ route('history.show', ['model' => 'AboutCompany', 'id' => $model->id]) }}"
                                                    class="btn btn-outline-warning ml-2">
                                                    <i class="icon-history"></i>
                                                </a>
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