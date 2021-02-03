
<div>
    <button  wire:click="updateOrderStatus" type="submit" class="float-right btn btn-success">Move to Deliver</button>
    <div wire:loading>
        @include('pages.components.loadingState')
    </div>
</div>
