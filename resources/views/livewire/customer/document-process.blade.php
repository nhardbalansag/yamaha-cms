<div class="my-4 ">

    <div>
        @if (session()->has('message'))
            <div class="container capitalize alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <form wire:submit.prevent="createDocument" enctype="multipart/form-data">
        <div class="mx-auto row col-md-12">
            <div class="mx-auto border rounded col-md-12">
                <div class="mx-auto my-4 col-md-6">
                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Select ID type</label>
                    <select wire:model='document_id' id="country" class="block w-full p-2 px-3 py-2 mt-1 transition duration-150 ease-in-out bg-white border-gray-400 border-solid rounded-md shadow-sm border-1 form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                    <option>Select type</option>
                        @for($i = 0; $i < count($document_category); $i++)
                                <option value ="{{ $document_category[$i]->id }}">{{ $document_category[$i]->title }}</option>
                        @endfor
                    </select>
                     @error('document_id') <span class="text-red-600 error">{{ $message }}</span> @enderror
                </div>
                <div class="mx-auto my-4 col-md-6">
                    <label class="block text-sm font-medium leading-5 text-gray-700 capitalize">Upload photo</label>
                    <div>
                        <div>
                            <label class="w-full py-2 font-semibold text-gray-800 bg-white border border-black rounded shadow-xs cursor-pointer hover:bg-gray-100">

                                <input type="file"
                                    wire:model="photo_path"
                                    x-ref="photo_path"
                                    id="photo_path"
                                    x-on:change="
                                        photoName = $refs.photo_path.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo_path.files[0]);
                                    "
                                hidden>
                                <div x-show="! photoPreview">
                                    <div class="d-flex justify-content-center">
                                        <svg height="34" width="34" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                    </div>
                                </div>
                            </label>
                            @error('photo_path') <p class="ml-2 text-lg italic text-red-500">{{$message}}</p> @enderror
                            <div id="displayFileName" wire:ignore></div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto my-4 col-md-6">
                    @if ($photo_path)
                       <p class="text-truncate text-primary"> {{ $photo_path->temporaryUrl() }}</p>
                    @endif
                </div>
                <div class="mx-auto my-4 col-md-6">
                    <button type="submit" class="btn btn-primary">Submit Document</button>
                </div>
            </div>
        </div>
    </form>
    <div class="p-0 mx-auto my-4 col-12 row">
        <div class="mx-auto my-4 text-md-center row col-6 col-md-12 d-md-none">
            <div class="col-md-3">file</div>
            <div class="col-md-3">file type</div>
            <div class="col-md-3">file status</div>
            <div class="col-md-3">action</div>
        </div>
        <div class="mx-auto my-4 text-center row col-6 col-md-12">
            <div class="col-md-3">file</div>
            <div class="font-bold col-md-3 text-capitalize">billing</div>
            <div class="col-md-3 ">
                <p class ="text-white rounded-pill bg-success text-capitalize">approved</p>
            </div>
            <div class="d-flex justify-content-center col-md-3 text-success">
                <svg height="30" width="30" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>
</div>
