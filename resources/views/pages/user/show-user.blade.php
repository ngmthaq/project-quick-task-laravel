@extends('layouts.master')

@section('title', __('User'))

@section('content')
    <x-section-header>{{ __('User') }}: {{ $user->full_name }}</x-section-header>

    <x-data-table>
        <x-slot name="heading">
            <div class="pl-3">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-light">
                    <i class="fas fa-chevron-left"></i> {{ __('Back') }}
                </a>
            </div>
        </x-slot>
        <form class="p-3">
            @csrf
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="first-name-input" class="required">{{ __('First name') }}</label>
                    <input type="text" id="first-name-input" class="form-control" value="{{ $user->first_name }}"
                        disabled />
                </div>
                <div class="form-group col-6">
                    <label for="last-name-input" class="required">{{ __('Last name') }}</label>
                    <input type="text" id="last-name-input" class="form-control" value="{{ $user->last_name }}"
                        disabled />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="email-input" class="required">{{ __('Email') }}</label>
                    <input type="text" id="email-input" class="form-control" value="{{ $user->email }}" disabled />
                </div>
                <div class="form-group col-6">
                    <label for="username-input" class="required">{{ __('Username') }}</label>
                    <input type="text" id="username-input" class="form-control" value="{{ $user->username }}"
                        disabled />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="permission-input" class="required">{{ __('Permission') }}</label>
                    <input type="text" id="permission-input" class="form-control"
                        value="{{ __('common.user_permission.description.' . $user->is_admin) }}" disabled />
                </div>
                <div class="form-group col-6">
                    <label for="status-input" class="required">{{ __('Status') }}</label>
                    <input type="text" id="status-input" class="form-control"
                        value="{{ __('common.user_status.description.' . $user->is_active) }}" disabled />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-primary">
                        {{ __('Edit user information') }}
                    </a>
                </div>
            </div>
        </form>
    </x-data-table>
@endsection
