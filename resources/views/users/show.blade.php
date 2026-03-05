@extends('layouts.admin')
@section('title', getTranslation('user детали'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
            <a href="{{ route('users.edit', $model->id) }}" class="btn btn-outline-success ml-2">
                {{ getTranslation('Редактировать') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <th style="width:20%">{{ getTranslation('name') }}</th>
                            <td>{{ $model->name }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('email') }}</th>
                            <td>{{ $model->email }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('role') }}</th>
                            <td>{{ $model->role }}</td>
                        </tr>
                        <tr>
                            <th style="width:20%">{{ getTranslation('password') }}</th>
                            <td>{{ $model->password }}</td>
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