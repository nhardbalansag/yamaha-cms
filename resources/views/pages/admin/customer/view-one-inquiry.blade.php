@extends('dashboard')
@section('contents')


<div class=" col-md-12">
    <div class="p-4 card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Read Mail</h3>

        <div class="card-tools">
          <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
          <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="p-0 card-body">
        <div class="pt-4 mailbox-read-info">
          <h5 class="font-weight-bold">Inquiry</h5>
          <h6>From: {{ $inquiries->email_address }}
            <span class="float-right mailbox-read-time">{{ date($inquiries->created_at )}}</span></h6>
        </div>
        <!-- /.mailbox-read-info -->
        <div class="text-center mailbox-controls with-border">
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
              <i class="far fa-trash-alt"></i></button>
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
              <i class="fas fa-reply"></i></button>
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
              <i class="fas fa-share"></i></button>
          </div>
          <!-- /.btn-group -->
          <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
            <i class="fas fa-print"></i></button>
        </div>
        <!-- /.mailbox-controls -->
        <div class=" mailbox-read-message">
          <p>Customer is inquiring about this product.</p>
        </div>
        <!-- /.mailbox-read-message -->
      </div>
      <!-- /.card-body -->
      <div class="bg-white card-footer">
        <ul class="clearfix mailbox-attachments d-flex align-items-stretch">

          <li>
            <span class="mailbox-attachment-icon has-img">
                <img class="w-20" src="{{asset('storage/' . $productinfo->photo_path) }}" alt="Attachment">
            </span>

            <div class="mailbox-attachment-info">
                <a href="{{asset('storage/' . $productinfo->photo_path) }}" class="text-black mailbox-attachment-name">
                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $productinfo->title }}.jpg
                </a>
                <span class="clearfix mt-1 mailbox-attachment-size">
                    <span>2.67 MB</span>
                    <a href="{{asset('storage/' . $productinfo->photo_path) }}" class="float-right btn btn-default btn-sm">
                        <i class="fas fa-cloud-download-alt"></i>
                    </a>
                </span>
            </div>
          </li>
        </ul>
      </div>
      <!-- /.card-footer -->
      <div class="card-footer">
        <div class="float-right">
          <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
          <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
        </div>
        <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
        <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
  </div>

  @endsection
