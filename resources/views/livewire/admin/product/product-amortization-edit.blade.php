<div>
    <form wire:submit.prevent="editAmortization">
        <div  class="w-1/4">
            <label>Price</label>
            <div class="mb-3 input-group">
                <span class="input-group-text" id="inputGroup-sizing-default">PHP</span>
                <input  wire:model.prevent="price" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div>
                @error('price') <p class="italic text-red-600 error">{{ $message }}</p> @enderror
            </div>
        </div>
        <div>
            <button type="submit" class="w-1/4 btn btn-dark">Add Amortization</button>
        </div>
    </form>
</div>
