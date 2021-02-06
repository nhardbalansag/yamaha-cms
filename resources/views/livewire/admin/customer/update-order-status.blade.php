
<div>
@if($transactionStatus === 'processing')
    <button wire:click="updateOrderStatus" type="submit" class="float-right btn btn-success">Move to Deliver</button>
@elseif($transactionStatus === 'deliver')
    <button wire:click="updateOrderStatus" type="submit" class="float-right btn btn-success">Move to Done</button>
@endif

    <div wire:loading>
        @include('pages.components.loadingState')
    </div>
</div>
