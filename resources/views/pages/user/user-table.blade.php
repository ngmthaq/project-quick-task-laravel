@extends('layouts.master')

@section('title', __('List of users'))

@section('content')
    <x-section-header>{{ __('List of users') }}</x-section-header>

    <x-data-table>
        <x-slot name="heading">
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                + {{ __('New user') }}
            </a>
        </x-slot>
        <table class="table mt-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('User ID') }}</th>
                    <th scope="col">{{ __('Email') }}</th>
                    <th scope="col">{{ __('Full name') }}</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $key => $user)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>
                                <a href="{{ route('users.tasks.index', ['user' => $user->id]) }}"
                                    class="btn btn-sm btn-outline-primary" title="{{ __('View tasks') }}">
                                    <i class="fas fa-tasks"></i>
                                </a>
                                <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                    class="btn btn-sm btn-outline-info" title="{{ __("View user's information") }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                    class="btn btn-sm btn-outline-warning" title="{{ __('Edit') }}">
                                    <i class="fas fa-pencil-ruler"></i>
                                </a>
                                <form class="d-inline" action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                    method="POST" onsubmit="return confirm('{{ __('Delete this user') }}?')">
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
                        <td colspan="5" class="text-center">{{ __('No data response') }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $users->onEachSide(3)->links() }}
    </x-data-table>
@endsection
