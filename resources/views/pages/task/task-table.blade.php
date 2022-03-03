@extends('layouts.master')

@section('title', __('List of tasks'))

@push('css')
    <style>
        .description-scroll {
            max-width: 360px;
            width: 100%;
            height: 96px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            line-clamp: 4;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
        }

        .title-scroll {
            max-width: 160px;
            width: 100%;
            height: 96px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            line-clamp: 4;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
        }

    </style>
@endpush

@section('content')
    <x-section-header>{{ __('List of tasks') }}</x-section-header>

    <x-data-table>
        <x-slot name="heading">
            <div class="d-flex justify-between">
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-light">
                    <i class="fas fa-chevron-left"></i> {{ __('Back') }}
                </a>
                <a href="{{ route('users.tasks.create', ['user' => $tasks->user_id]) }}" class="btn btn-sm btn-primary">
                    + {{ __('New task') }}
                </a>
            </div>
        </x-slot>

        <table class="table mt-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('User ID') }}</th>
                    <th scope="col">{{ __('Full name') }}</th>
                    <th scope="col">{{ __('Title') }}</th>
                    <th scope="col">{{ __('Description') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if (count($tasks) > 0)
                    @foreach ($tasks as $key => $task)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <th>{{ $task->user_id }}</th>
                            <td>{{ $task->full_name }}</td>
                            <td>
                                <div class="title-scroll">
                                    {{ $task->title }}
                                </div>
                            </td>
                            <td>
                                <div class="description-scroll">
                                    {{ $task->description }}
                                </div>
                            </td>
                            <td>{{ __('common.task.description.' . $task->is_completed) }}</td>
                            <td>
                                <a href="{{ route('users.tasks.show', ['user' => $task->user_id, 'task' => $task->id]) }}"
                                    class="btn btn-sm btn-outline-info" title="{{ __('View') }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('users.tasks.edit', ['user' => $task->user_id, 'task' => $task->id]) }}"
                                    class="btn btn-sm btn-outline-warning" title="{{ __('Edit') }}">
                                    <i class="fas fa-pencil-ruler"></i>
                                </a>
                                <form
                                    action="{{ route('users.tasks.destroy', ['user' => $task->user_id, 'task' => $task->id]) }}"
                                    method="post" class="d-inline" onsubmit="return confirm('{{ __('Delete this task') }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">{{ __('No data response') }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $tasks->onEachSide(3)->links() }}
    </x-data-table>
@endsection
