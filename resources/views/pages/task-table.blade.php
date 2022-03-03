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
            <x-modal :button-title="__('New task')" modal-id="create-new-task" modal-size="modal-lg">
                <form class="p-3">
                    @csrf
                    <input type="hidden" name="user_id" value="1">
                    <div class="form-group">
                        <label for="task-title-input" class="required">{{ __('Title') }}</label>
                        <input type="text" name="title" id="task-title-input" class="form-control"
                            placeholder="{{ __('Enter title') }}..." />
                    </div>
                    <div class="form-group">
                        <label for="task-description-input" class="required">{{ __('Description') }}</label>
                        <textarea name="description" id="task-description-input" cols="24" rows="8"
                            class="form-control"></textarea>
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
                    <th scope="col">{{ __('User ID') }}</th>
                    <th scope="col">{{ __('Full name') }}</th>
                    <th scope="col">{{ __('Title') }}</th>
                    <th scope="col">{{ __('Description') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 5; $i++)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <th>1</th>
                        <td>Nguyen Manh Thang B</td>
                        <td>
                            <div class="title-scroll">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit
                            </div>
                        </td>
                        <td>
                            <div class="description-scroll">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas quasi est quae placeat
                                distinctio,
                                aliquid incidunt laudantium animi corrupti optio rem at aspernatur harum molestias ipsa
                                adipisci
                                culpa nostrum corporis.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas quasi est quae placeat
                                distinctio,
                                aliquid incidunt laudantium animi corrupti optio rem at aspernatur harum molestias ipsa
                                adipisci
                                culpa nostrum corporis.
                            </div>
                        </td>
                        <td>{{ __('common.task.description.' . rand(0, 1)) }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-info" title="{{ __("View") }}">
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
