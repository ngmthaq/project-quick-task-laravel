<!-- Button trigger modal -->
@props(['button-class', 'button-title', 'modal-id', 'modal-size'])

<button type="button" class="btn btn-sm btn-primary {{ $buttonClass ?? '' }}" data-toggle="modal"
    data-target="#{{ $modalId }}">
    {{ $buttonTitle }}
</button>

<!-- Modal -->
<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}-label"
    aria-hidden="true">
    <div class="modal-dialog {{ $modalSize ?? '' }}">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="{{ $modalId }}-label">{{ $buttonTitle }}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
