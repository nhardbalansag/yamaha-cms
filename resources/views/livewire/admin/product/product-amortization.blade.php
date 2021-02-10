<div>
    <div class="w-1/4 mt-2">
        @if (session()->has('addAmortizationmessage'))
            <div class="container text-center capitalize alert alert-success">
                {{ session('addAmortizationmessage') }}
            </div>
        @endif
    </div>
    <form wire:submit.prevent="addAmortization">
        <div class="w-1/4 col-span-3 my-2 sm:col-span-3">
            <label for="country" class="block text-xl font-medium leading-5 text-gray-700">Amortization Plan</label>
            <select wire:model.prevent="months" id="country" class="block w-full px-3 py-2 mt-1 text-xl transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                <option>Select Month</option>
                <option value = '12' >12 Months</option>
                <option value = '18' >18 Months</option>
                <option value = '24' >24 Months</option>
                <option value = '30' >30 Months</option>
                <option value = '36' >36 Months</option>
            </select>
            @error('months') <span class="italic text-red-600 error">{{ $message }}</span> @enderror
        </div>
        <div  class="w-1/4">
            <label>Price</label>
            <div class="mb-3 input-group">
                <span class="input-group-text" id="inputGroup-sizing-default">Count</span>
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
