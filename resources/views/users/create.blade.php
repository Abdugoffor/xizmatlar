@extends('layouts.admin')
@section('title', getTranslation('Создать user'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('user') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('name') }}</label>
                                    <input type="text" class="form-control"
                                           name="name"
                                           value="{{ old('name') }}"
                                           placeholder="{{ getTranslation('name') }}">
                                    @error('name')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('email') }}</label>
                                    <input type="email" class="form-control"
                                           name="email"
                                           value="{{ old('email') }}"
                                           placeholder="{{ getTranslation('email') }}">
                                    @error('email')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('role') }}</label>
                                    <select name="role" class="form-control">
                                        <option value="">{{ getTranslation('Выберите role') }}</option>
                                        <option value="user" selected>user</option>
                                        <option value="admin" >admin</option>

                                    </select>
                                    @error('role')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('password') }}</label>
                                    <input type="text" class="form-control"
                                           name="password"
                                           value="{{ old('password') }}"
                                           placeholder="{{ getTranslation('password') }}">
                                    @error('password')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </fieldset>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">{{ getTranslation('Добавить') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection