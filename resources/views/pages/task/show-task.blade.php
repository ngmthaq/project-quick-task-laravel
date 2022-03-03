@extends('layouts.master')

@section('title', __('Edit task'))

@section('content')
    <x-section-header>{{ __('Edit task') }}</x-section-header>

    <x-data-table>
        <x-slot name="heading">
            <div class="d-flex justify-between">
                <a href="{{ route('users.tasks.index', ['user' => $user]) }}" class="btn btn-sm btn-light">
                    <i class="fas fa-chevron-left"></i> {{ __('Back') }}
                </a>
            </div>
        </x-slot>

        <form class="p-3">
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="task-title-input" class="required">{{ __('Title') }}</label>
                    <input type="text" name="title" id="task-title-input" class="form-control"
                        placeholder="{{ __('Enter title') }}..." value="{{ $task->title }}" disabled />
                </div>
                <div class="form-group col-6">
                    <label for="task-status-input" class="required">{{ __('Status') }}</label>
                    <select name="is_completed" id="task-status-input" class="form-control" disabled>
                        @if ($task->isCompleted)
                            <option value="1">{{ __('Completed') }}</option>
                            <option value="0">{{ __('In Progress') }}</option>
                        @else
                            <option value="0">{{ __('In Progress') }}</option>
                            <option value="1">{{ __('Completed') }}</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="task-description-input" class="required">{{ __('Description') }}</label>
                    <textarea name="description" id="task-description-input" cols="24" rows="8" disabled
                        class="form-control">{{ $task->description }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <a href="{{ route('users.tasks.edit', ['user' => $user, 'task' => $task->id]) }}"
                        class="btn btn-sm btn-primary">
                        {{ __('Edit task') }}
                    </a>
                </div>
            </div>
        </form>
    </x-data-table>
@endsection
