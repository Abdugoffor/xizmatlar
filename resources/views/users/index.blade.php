@extends('layouts.admin')
@section('title', getTranslation('User'))
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
                            <a href="{{ route('users.create') }}" class="btn btn-teal">
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
                                <th class="text-center">{{ getTranslation('email') }}</th>
                                <th class="text-center">{{ getTranslation('role') }}</th>
                                <th class="text-center">{{ getTranslation('password') }}</th>

                                    <th class="text-center">{{ getTranslation('Действия') }}</th>
                                </tr>
                                <form action="{{ route('users.index') }}" method="get">
                                    <tr>
                                <th class="text-center"></th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="name"
                                           placeholder="{{ getTranslation('name') }}"
                                           value="{{ old('name', request('name')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="email"
                                           placeholder="{{ getTranslation('email') }}"
                                           value="{{ old('email', request('email')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="role"
                                           placeholder="{{ getTranslation('role') }}"
                                           value="{{ old('role', request('role')) }}">
                                </th>
                                <th class="text-center">
                                    <input type="text" class="form-control" name="password"
                                           placeholder="{{ getTranslation('password') }}"
                                           value="{{ old('password', request('password')) }}">
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
                            <td>{{ $model->name }}</td>
                            <td>{{ $model->email }}</td>
                            <td>{{ $model->role }}</td>
                            <td>{{ $model->password }}</td>

                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('users.show', $model->id) }}" class="btn btn-outline-info">
                                                    <i class="icon-eye8"></i>
                                                </a>
                                                <a href="{{ route('users.edit', $model->id) }}" class="btn btn-outline-success ml-2">
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
                                                        <form action="{{ route('users.destroy', $model->id) }}" method="post">
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