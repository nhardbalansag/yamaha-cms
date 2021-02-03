<div>
    <div>
        <button wire:click="approve" type="button" class="btn btn-primary">Approved</button>
    </div>
    <div wire:loading>
        @include('pages.components.loadingState')
    </div>
</div>
