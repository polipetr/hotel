@extends('layouts.dashboard')

@section('content')
    <div class="db-cent-3">
        <div class="db-cent-table db-com-table">
            <div class="db-title">
                <h3>Редактиране</h3>
                <p>Р.</p>
            </div>
            <div class="book-form inn-com-form db-form">

                {!! Form::open(array('url' => 'dashboard/profile/', 'class' => 'col s12', 'files' => true)) !!}
                {{ Form::hidden('_method', 'PUT') }}
                @csrf
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="first_name" type="text"
                                   class="validate {{ $errors->has('first_name') ? ' invalid' : '' }}" value="{{ $user->first_name }}" required autofocus>
                            <label>Име</label>
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <input name="last_name" type="text"
                                   class="validate {{ $errors->has('last_name') ? ' invalid' : '' }}" value="{{ $user->last_name }}" required>
                            <label>Презиме</label>
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="gender">
                                <option value="" disabled selected>Пол</option>
                                <option value="male" @if($user->gender == "male") selected="selected"@endif>Мъж
                                </option>
                                <option value="female" @if($user->gender == "female") selected="selected"@endif>Жена
                                </option>
                                <option value="others" @if($user->gender == "others") selected="selected"@endif>Друг
                                </option>
                            </select>
                            @if ($errors->has('gender'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <input name="phone" type="text"
                                   class="validate {{ $errors->has('phone') ? ' invalid' : '' }}" value="{{ $user->phone }}">
                            <label>Телефон</label>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="address" type="text"
                                   class="validate {{ $errors->has('address') ? ' invalid' : '' }}" value="{{ $user->address }}">
                            <label>Адрес</label>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <span>Снимка:</span>
                            <input name="avatar" type="file"
                                   class="validate {{ $errors->has('avatar') ? ' invalid' : '' }}" value="{{ $user->avatar }}">

                            @if ($errors->has('avatar'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="email" type="email"
                                   class="validate {{ $errors->has('email') ? ' invalid' : '' }}" value="{{ $user->email }}" required>
                            <label>Имейл</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="about" id="textarea" class="materialize-textarea" data-length="300">{{ $user->about }}</textarea>
                            <label class="">За мен</label>
                            <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
                            @if ($errors->has('about'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>



                    <div class="row">
                        <div class="input-field col s12">
                            <input type="submit" value="submit" class="form-btn"> </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
