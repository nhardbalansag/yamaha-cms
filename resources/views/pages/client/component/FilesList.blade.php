<div >
    <div class="mt-4">
        <p class="h6 text-capitalize">Approval status</p>
    </div>
    <div class="progress">
        <div class="progress-bar {{ $approval_result >= 100 ? 'bg-success' : 'bg-primary' }}" style="width: {{ $approval_result }}%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $approval_result }}%</div>
    </div>
@if ($approval_result >= 100)
   <div class="col-12">
      <div class="d-flex justify-content-center align-items-center">
            <div class="text-success d-flex justify-content-center align-items-center ">
                <svg width="50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center ">
            <p class="text-xl text-success">VERIFIED</p>
        </div>
      </div>
   </div>
@else
    <div>
        <p class="text-lg">Document List</p>
        <p class="text-sm">document status | documents informations</p>
    </div>
    <div class="text-center d-flex justify-content-end align-items-center col-12">
        <a class="text-dark" data-toggle="collapse" href="#documentButton" role="button" aria-expanded="false" aria-controls="documentButton">
            <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </a>
    </div>
    @foreach($submitted_document as $key => $value)

        <div class=" row col-12">
            <div class="col-2 ">
                <svg width="50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div class="col-6">
                <div class="p-0 col-12">
                    <span class="p-0 text-xs text-capitalize">{{ $value->document_title }}</span>
                </div>
                <div class="p-0 col-12">
                    <p class="text-xs text-muted text-truncate">{{ $value->file_path }}</p>
                </div>
            </div>
            <div class="text-center  d-flex justify-content-center align-items-center col-2 {{ $value->file_status == 'approved' ?  "text-success" : ( $value->file_status == 'pending' ? "text-warning" : "text-danger")}}">
               @if ($value->file_status === "approved")
                    <svg width="30"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
               @elseif($value->file_status === "decline")
                    <svg width="30"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
               @else
                    <svg width="30"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
               @endif
            </div>

            <div class="row col-12 collapse" id="documentButton">
                <div class="col-4">
                    <a href="{{ asset('storage/' . $value->file_path) }}">
                        <img src="{{asset('storage/' . $value->file_path) }}"  alt="Product Image">
                    </a>
                </div>
                <div class=" col-8">
                    <div class="mb-2 d-flex justify-content-center align-items-center col-12">
                        <a href="" class="text-danger d-flex justify-content-center align-items-center">
                            <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            <span>Delete</span>
                        </a>
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <a href="/my-account/credential/documents/resubmit/{{ $value->doc_id}}" class="text-primary d-flex justify-content-center align-items-center">
                            <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span>Resubmit</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
</div>
