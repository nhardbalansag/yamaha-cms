<div>
    <form wire:submit.prevent="updateInventoryCount">
        <div  class="w-1/2">
            <label>Inventory Count</label>
            <div class="mb-3 input-group">
                <span class="input-group-text" id="inputGroup-sizing-default">Count</span>
                <input  wire:model.prevent="count" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div>
                @error('count') <p class="italic text-red-600 error">{{ $message }}</p> @enderror
            </div>
        </div>
        <div>
            <button class="w-1/2 btn btn-dark">Update inventory</button>
        </div>
        <div class="w-1/2 mt-2">
            @if (session()->has('inventoryMessage'))
                <div class="container text-center capitalize alert alert-success">
                    {{ session('inventoryMessage') }}
                </div>
            @endif
        </div>
    </form>

    <div wire:loading>
        @include('pages.components.loadingState')
    </div>
</div>



