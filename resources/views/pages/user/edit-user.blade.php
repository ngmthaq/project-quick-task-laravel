@extends('layouts.master')

@section('title', __('Edit user information'))

@section('content')
    <x-section-header>{{ __('Edit user information') }}: {{ $user->full_name }}</x-section-header>

    <x-data-table>
        <x-slot name="heading">
            <div class="pl-3">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-light">
                    <i class="fas fa-chevron-left"></i> {{ __('Back') }}
                </a>
            </div>
        </x-slot>
        <form class="p-3" action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="first-name-input" class="required">{{ __('First name') }}</label>
                    <input type="text" name="first_name" id="first-name-input" class="form-control"
                        placeholder="{{ __('Enter first name') }}..." value="{{ $user->first_name }}" />
                    <small class="text-danger">{{ $errors->first('first_name') ?? '' }}</small>
                </div>
                <div class="form-group col-6">
                    <label for="last-name-input" class="required">{{ __('Last name') }}</label>
                    <input type="text" name="last_name" id="last-name-input" class="form-control"
                        placeholder="{{ __('Enter last name') }}..." value="{{ $user->last_name }}" />
                    <small class="text-danger">{{ $errors->first('last_name') ?? '' }}</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="permission-input" class="required">{{ __('Permission') }}</label>
                    <select name="is_admin" id="permission-input" class="form-control">
                        @if ($user->isAdmin())
                            <option value="1">{{ __('Admin') }}</option>
                            <option value="0">{{ __('User') }}</option>
                        @else
                            <option value="0">{{ __('User') }}</option>
                            <option value="1">{{ __('Admin') }}</option>
                        @endif
                    </select>
                    <small class="text-danger">{{ $errors->first('is_admin') ?? '' }}</small>
                </div>
                <div class="form-group col-6">
                    <label for="status-input" class="required">{{ __('Status') }}</label>
                    <select name="is_active" id="status-input" class="form-control">
                        @if ($user->isActive())
                            <option value="1">{{ __('Active') }}</option>
                            <option value="0">{{ __('Unactive') }}</option>
                        @else
                            <option value="0">{{ __('Unactive') }}</option>
                            <option value="1">{{ __('Active') }}</option>
                        @endif
                    </select>
                    <small class="text-danger">{{ $errors->first('is_active') ?? '' }}</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 mb-0">
                    <button class="btn btn-sm btn-primary mr-1">{{ __('Edit') }}</button>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </div>
        </form>
    </x-data-table>
@endsection
