@extends('layouts.master')

@section('title', __('New task'))

@section('content')
    <x-section-header>{{ __('New task') }}</x-section-header>

    <x-data-table>
        <x-slot name="heading">
            <div class="d-flex justify-between">
                <a href="{{ route('users.tasks.index', ['user' => $user]) }}" class="btn btn-sm btn-light">
                    <i class="fas fa-chevron-left"></i> {{ __('Back') }}
                </a>
            </div>
        </x-slot>

        <form class="p-3" method="POST" action="{{ route('users.tasks.store', ['user' => $user]) }}">
            @csrf
            <div class="form-group">
                <label for="task-title-input" class="required">{{ __('Title') }}</label>
                <input type="text" name="title" id="task-title-input" class="form-control"
                    placeholder="{{ __('Enter title') }}..." value="{{ old('title') }}" />
                <small class="text-danger">{{ $errors->first('title') ?? '' }}</small>
            </div>
            <div class="form-group">
                <label for="task-description-input" class="required">{{ __('Description') }}</label>
                <textarea name="description" id="task-description-input" cols="24" rows="8"
                    class="form-control">{{ old('description') }}</textarea>
                <small class="text-danger">{{ $errors->first('description') ?? '' }}</small>
            </div>
            <div class="form-row">
                <div class="form-group col-12 mb-0">
                    <button class="btn btn-sm btn-primary mr-3">{{ __('Add') }}</button>
                </div>
            </div>
        </form>
    </x-data-table>
@endsection
