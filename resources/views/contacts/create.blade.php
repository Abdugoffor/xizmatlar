@extends('layouts.admin')
@section('title', getTranslation('Создать contact'))
@section('content')
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('contacts.index') }}" class="btn btn-outline-secondary">
                {{ getTranslation('Назад') }}
            </a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">
                            {{ getTranslation('contact') }}
                        </legend>
                        <div class="form-group row">
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('contacts_phone 1') }}</label>
                                    <input type="text" class="form-control"
                                           name="phone_1"
                                           value="{{ old('phone_1') }}"
                                           placeholder="{{ getTranslation('contacts_phone 1') }}">
                                    @error('phone_1')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('contacts_phone 2') }}</label>
                                    <input type="text" class="form-control"
                                           name="phone_2"
                                           value="{{ old('phone_2') }}"
                                           placeholder="{{ getTranslation('contacts_phone 2') }}">
                                    @error('phone_2')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('contacts_phone 3') }}</label>
                                    <input type="text" class="form-control"
                                           name="phone_3"
                                           value="{{ old('phone_3') }}"
                                           placeholder="{{ getTranslation('contacts_phone 3') }}">
                                    @error('phone_3')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('contacts_email 1') }}</label>
                                    <input type="text" class="form-control"
                                           name="email_1"
                                           value="{{ old('email_1') }}"
                                           placeholder="{{ getTranslation('contacts_email 1') }}">
                                    @error('email_1')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('contacts_email 2') }}</label>
                                    <input type="text" class="form-control"
                                           name="email_2"
                                           value="{{ old('email_2') }}"
                                           placeholder="{{ getTranslation('contacts_email 2') }}">
                                    @error('email_2')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('contacts_email 3') }}</label>
                                    <input type="text" class="form-control"
                                           name="email_3"
                                           value="{{ old('email_3') }}"
                                           placeholder="{{ getTranslation('contacts_email 3') }}">
                                    @error('email_3')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ getTranslation('contacts_address') }}</label>
                                    <ul class="nav nav-tabs mt-1" id="tabs-address">
                                        @foreach (getLanguage() as $lang)
                                            <li class="nav-item">
                                                <a href="#tab-address-{{ $lang->id }}"
                                                   class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                   data-toggle="tab">
                                                    {{ $lang->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content border border-top-0 p-2 mb-1">
                                        @foreach (getLanguage() as $lang)
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                 id="tab-address-{{ $lang->id }}">
                                                <input type="text"
                                                       class="form-control mt-1"
                                                       name="address[{{ $lang->name }}]"
                                                       value="{{ old('address.' . $lang->name) }}"
                                                       placeholder="{{ $lang->name }}">
                                                @error('address.' . $lang->name)
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('contacts_tlegram') }}</label>
                                    <input type="text" class="form-control"
                                           name="tlegram"
                                           value="{{ old('tlegram') }}"
                                           placeholder="{{ getTranslation('contacts_tlegram') }}">
                                    @error('tlegram')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('contacts_facebook') }}</label>
                                    <input type="text" class="form-control"
                                           name="facebook"
                                           value="{{ old('facebook') }}"
                                           placeholder="{{ getTranslation('contacts_facebook') }}">
                                    @error('facebook')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('contacts_instagram') }}</label>
                                    <input type="text" class="form-control"
                                           name="instagram"
                                           value="{{ old('instagram') }}"
                                           placeholder="{{ getTranslation('contacts_instagram') }}">
                                    @error('instagram')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('contacts_watsapp') }}</label>
                                    <input type="text" class="form-control"
                                           name="watsapp"
                                           value="{{ old('watsapp') }}"
                                           placeholder="{{ getTranslation('contacts_watsapp') }}">
                                    @error('watsapp')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('contacts_linked') }}</label>
                                    <input type="text" class="form-control"
                                           name="linked"
                                           value="{{ old('linked') }}"
                                           placeholder="{{ getTranslation('contacts_linked') }}">
                                    @error('linked')
                                        <p style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ getTranslation('contacts_location') }}</label>
                                    <input type="text" class="form-control"
                                           name="location"
                                           value="{{ old('location') }}"
                                           placeholder="{{ getTranslation('contacts_location') }}">
                                    @error('location')
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