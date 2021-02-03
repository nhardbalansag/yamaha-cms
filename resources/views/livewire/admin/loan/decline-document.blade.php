<div>
    <div>
        <button wire:click="decline" type="button" class="btn btn-danger">Decline</button>
    </div>
    <div wire:loading>
        @include('pages.components.loadingState')
    </div>
</div>
