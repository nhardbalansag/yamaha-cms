
<form wire:submit.prevent="updateProductStatus">
    <div class="w-1/2 col-span-3 my-2 sm:col-span-3">
        <label for="country" class="block text-xl font-medium leading-5 text-gray-700">Status</label>
        <select wire:model.prevent="status" id="country" class="block w-full px-3 py-2 mt-1 text-xl transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
            <option>Select Status</option>
            <option value = "publish" >Publish</option>
            <option value = "pending" >Pending</option>
        </select>
        @error('status') <span class="italic text-red-600 error">{{ $message }}</span> @enderror
    </div>
    <div>
        <button class="w-1/2 btn btn-dark">Update status</button>
    </div>
    <div class="w-1/2 mt-2">
        @if (session()->has('message'))
            <div class="container text-center capitalize alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
</form>
