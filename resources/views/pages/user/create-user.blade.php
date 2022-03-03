@extends('layouts.master')

@section('title', __('New user'))

@section('content')
    <x-section-header>{{ __('New user') }}</x-section-header>

    <x-data-table>
        <x-slot name="heading">
            <div class="pl-3">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-light">
                    <i class="fas fa-chevron-left"></i> {{ __('Back') }}
                </a>
            </div>
        </x-slot>
        <form class="p-3" action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="first-name-input" class="required">{{ __('First name') }}</label>
                    <input type="text" name="first_name" id="first-name-input" class="form-control"
                        placeholder="{{ __('Enter first name') }}..." value="{{ old('first_name') }}" />
                    <small class="text-danger">{{ $errors->first('first_name') ?? '' }}</small>
                </div>
                <div class="form-group col-6">
                    <label for="last-name-input" class="required">{{ __('Last name') }}</label>
                    <input type="text" name="last_name" id="last-name-input" class="form-control"
                        placeholder="{{ __('Enter last name') }}..." value="{{ old('last_name') }}" />
                    <small class="text-danger">{{ $errors->first('last_name') ?? '' }}</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="email-input" class="required">{{ __('Email') }}</label>
                    <input type="text" name="email" id="email-input" class="form-control"
                        placeholder="{{ __('Enter email') }}..." value="{{ old('email') }}" />
                    <small class="text-danger">{{ $errors->first('email') ?? '' }}</small>
                </div>
                <div class="form-group col-6">
                    <label for="username-input" class="required">{{ __('Username') }}</label>
                    <input type="text" name="username" id="username-input" class="form-control"
                        placeholder="{{ __('Enter username') }}..." value="{{ old('username') }}" />
                    <small class="text-danger">{{ $errors->first('username') ?? '' }}</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="password-input" class="required">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password-input" class="form-control"
                        placeholder="{{ __('Enter password') }}..." />
                    <small class="text-danger">{{ $errors->first('password') ?? '' }}</small>
                </div>
                <div class="form-group col-6">
                    <label for="confirm-password-input" class="required">{{ __('Confirm password') }}</label>
                    <input type="password" name="password_confirmation" id="confirm-password-input" class="form-control"
                        placeholder="{{ __('Confirm password') }}..." />
                    <small class="text-danger">{{ $errors->first('password_confirmation') ?? '' }}</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="permission-input" class="required">{{ __('Permission') }}</label>
                    <select name="is_admin" id="permission-input" class="form-control">
                        <option value="">{{ __('Choose') }}...</option>
                        <option value="0">{{ __('User') }}</option>
                        <option value="1">{{ __('Admin') }}</option>
                    </select>
                    <small class="text-danger">{{ $errors->first('is_admin') ?? '' }}</small>
                </div>
                <div class="form-group col-6">
                    <label for="status-input" class="required">{{ __('Status') }}</label>
                    <select name="is_active" id="status-input" class="form-control">
                        <option value="">{{ __('Choose') }}...</option>
                        <option value="1">{{ __('Active') }}</option>
                        <option value="0">{{ __('Unactive') }}</option>
                    </select>
                    <small class="text-danger">{{ $errors->first('is_active') ?? '' }}</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 mb-0">
                    <button class="btn btn-sm btn-primary mr-1">{{ __('Add') }}</button>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </div>
        </form>
    </x-data-table>
@endsection
