@extends('layouts.master')

@section('title', __('List of users'))

@section('content')
    <x-section-header>{{ __('List of users') }}</x-section-header>

    <x-data-table>
        <x-slot name="heading">
            <x-modal :button-title="__('New user')" modal-id="create-new-user" modal-size="modal-lg">
                <form class="p-3">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="first-name-input" class="required">{{ __('First name') }}</label>
                            <input type="text" name="firstName" id="first-name-input" class="form-control"
                                placeholder="{{ __('Enter first name') }}..." />
                        </div>
                        <div class="form-group col-6">
                            <label for="last-name-input" class="required">{{ __('Last name') }}</label>
                            <input type="text" name="lastName" id="last-name-input" class="form-control"
                                placeholder="{{ __('Enter last name') }}..." />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="email-input" class="required">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email-input" class="form-control"
                                placeholder="{{ __('Enter email') }}..." />
                        </div>
                        <div class="form-group col-6">
                            <label for="username-input" class="required">{{ __('Username') }}</label>
                            <input type="text" name="username" id="username-input" class="form-control"
                                placeholder="{{ __('Enter username') }}..." />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="password-input" class="required">{{ __('Password') }}</label>
                            <input type="password" name="password" id="password-input" class="form-control"
                                placeholder="{{ __('Enter password') }}..." />
                        </div>
                        <div class="form-group col-6">
                            <label for="confirm-password-input"
                                class="required">{{ __('Confirm password') }}</label>
                            <input type="password" name="confirmPassword" id="confirm-password-input" class="form-control"
                                placeholder="{{ __('Confirm password') }}..." />
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
                        </div>
                        <div class="form-group col-6">
                            <label for="status-input" class="required">{{ __('Status') }}</label>
                            <select name="is_active" id="status-input" class="form-control">
                                <option value="">{{ __('Choose') }}...</option>
                                <option value="1">{{ __('Active') }}</option>
                                <option value="0">{{ __('Unactive') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 mb-0">
                            <button class="btn btn-sm btn-primary mr-3">{{ __('Add') }}</button>
                        </div>
                    </div>
                </form>
            </x-modal>
        </x-slot>

        <table class="table mt-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Email') }}</th>
                    <th scope="col">{{ __('Full name') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 5; $i++)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>admin@sun.com</td>
                        <td>Admin</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary" title="{{ __('View tasks') }}">
                                <i class="fas fa-tasks"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-info" title="{{ __("View user's information") }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-warning" title="{{ __('Edit') }}">
                                <i class="fas fa-pencil-ruler"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-danger" title="{{ __('Delete') }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </x-data-table>
@endsection
