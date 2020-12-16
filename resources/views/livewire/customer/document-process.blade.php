
<div class="mt-4">

    @if ($percent >= 100)
        <div class="col-12 {{ $approval_result >= 100 ? "d-none" : "block" }}">
            <div class="text-center col-12">
                <span class="text-xl ">This will take a moment We are verifying your documents..</span>
            </div>
            <div class="my-4 d-flex justify-content-center">
                <div class="ml-2 spinner-grow spinner-grow-sm " role="status">
                </div>
            </div>
        </div>
    @else
        <div >
            <div>
                <p class="text-lg">Document Upload</p>
                <p class="text-sm">upload you documents | documents informations</p>
            </div>
            <div>
                @if (session()->has('message'))
                    <div class="container capitalize alert alert-success">
                        {{ session('message') }}
                    </div>
                @elseif(session()->has('error'))
                    <div class="container capitalize alert alert-warning">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            <div class="text-center col-12">
                <div class=" col-12 d-flex justify-content-center align-items-end" style="color:#1b3295">
                    <svg width="150"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <form wire:submit.prevent="createDocument" enctype="multipart/form-data" >
                    <div class="col-12">
                        <div class="mb-2 form-check">
                            <input wire:model='document_id' class="form-check-input" type="radio" name="flexRadioDefault" value="{{ $tosubmitDocument[0]->documentId }}" id="flexRadioDefault2" checked>
                            <label class="form-check-label h3 text-uppercase font-weight-bold" for="flexRadioDefault2">{{ $tosubmitDocument[0]->documentTitle }}</label>
                        </div>
                        @error('document_id') <span class="text-red-600 error">{{ $message }}</span> @enderror
                        <p class="p-0 text-capitalize text-muted">
                            Please provide these following requirements for you to be able to proceed on the next step of the process.
                        </p>
                    </div>
                    <div class="col-12">
                        <div class="p-0 mx-auto my-4 col-12 col-md-6">
                            <label class="block text-sm font-medium leading-5 text-gray-700 capitalize">Upload photo</label>
                            <div>
                                <label class="w-full py-2 font-semibold text-gray-800 bg-white border-black rounded shadow-xs cursor-pointer border-bottom hover:bg-gray-100">
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
                                        <div class="row col-12 d-flex justify-content-center align-items-center"  style="color:#1b3295">
                                            <div class="p-0 d-flex justify-content-end col-2">
                                                <svg height="59" width="50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div class="p-0 text-left col-10 ">
                                                <div class="p-0 col-12">
                                                    <span class="p-0 text-xs text-capitalize" >select documents from gallery</span>
                                                </div>
                                                <div class="p-0 col-12">
                                                    @if ($photo_path)
                                                    <p class="text-xs text-truncate text-muted">{{ $photo_path->temporaryUrl() }}</p>
                                                    @endif
                                                    @error('photo_path') <p class="ml-2 text-xs italic text-red-500">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="mx-auto col-12 col-md-3">
                            <button type="submit" class="w-full btn btn-dark">Submit Document</button>
                        </div>
                    </div>
                </form>
            </div>
            <div wire:loading>
                @include('pages.components.loadingState')
        </div>
        </div>
    @endif
    <div>
        @include('pages.client.component.FilesList')
    </div>
</div>
