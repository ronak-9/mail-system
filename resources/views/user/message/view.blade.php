@extends('layouts.master')
@section('title', 'Mail')
@section('pageCSS')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-email.css') }}">
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="app-email card">
            <div class="border-0">
                <div class="row g-0">
                    <!-- Email Sidebar -->
                    @include('user.message.layouts.sidebar')
                    <!--/ Email Sidebar -->



                    <!-- Email View -->
                    <div class="col app-email-view flex-grow-0 bg-body show" id="app-email-view">


                        <div class="app-email-view-header p-3 py-md-3 py-2 rounded-0">
                            <!-- Email View : Title  bar-->
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center overflow-hidden">
                                    <i class="bx bx-chevron-left bx-sm cursor-pointer me-2" data-bs-toggle="sidebar"
                                        data-target="#app-email-view"></i>
                                    <h6 class="text-truncate mb-0 me-2">{{ $thread->messages->first()->subject }}</h6>
                                    <span class="badge bg-label-warning">Important</span>
                                </div>
                                <!-- Email View : Action  bar-->
                                <div class="d-flex">
                                    <i class="bx bx-printer d-sm-block d-none fs-4"></i>
                                    <div class="dropdown ms-3">
                                        <button class="btn p-0" type="button" id="dropdownMoreOptions"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded fs-4"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMoreOptions">
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="bx bx-envelope-open bx-xs me-1"></i>
                                                <span class="align-middle">Mark as unread</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="bx bx-envelope-open bx-xs me-1"></i>
                                                <span class="align-middle">Mark as unread</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="bx bx-star bx-xs me-1"></i>
                                                <span class="align-middle">Add star</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="bx bx-calendar bx-xs me-1"></i>
                                                <span class="align-middle">Create Event</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="bx bx-volume-mute bx-xs me-1"></i>
                                                <span class="align-middle">Mute</span>
                                            </a>
                                            <a class="dropdown-item d-sm-none d-block" href="javascript:void(0)">
                                                <i class="bx bx-printer bx-xs me-1"></i>
                                                <span class="align-middle">Print</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="app-email-view-hr mx-n3 mb-2" />
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bx bx-trash-alt cursor-pointer me-3 fs-4" data-bs-toggle="sidebar"
                                        data-target="#app-email-view"></i>
                                    <i class="bx bx-envelope fs-4 cursor-pointer me-3"></i>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="dropdownMenuFolderTwo"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-folder fs-4 me-3"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuFolderTwo">
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="bx bx-error-circle me-1"></i>
                                                <span class="align-middle">Spam</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="bx bx-edit me-1"></i>
                                                <span class="align-middle">Draft</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="bx bx-trash-alt me-1"></i>
                                                <span class="align-middle">Trash</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="dropdownLabelTwo"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-label fs-4 me-3"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLabelTwo">
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="badge badge-dot bg-success me-1"></i>
                                                <span class="align-middle">Workshop</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="badge badge-dot bg-primary me-1"></i>
                                                <span class="align-middle">Company</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="badge badge-dot bg-warning me-1"></i>
                                                <span class="align-middle">Important</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center flex-wrap justify-content-end">
                                    <span class="d-sm-block d-none mx-3 text-muted">1-10 of 653</span>
                                    <i class="bx bx-chevron-left scaleX-n1-rtl cursor-pointer text-muted me-4 fs-4"></i>
                                    <i class="bx bx-chevron-right scaleX-n1-rtl cursor-pointer fs-4"></i>
                                </div>
                            </div>
                        </div>
                        <hr class="m-0" />

                        <!-- Email View : Content-->
                        <div class="app-email-view-content py-4">
                            {{-- <p class="email-earlier-msgs text-center text-muted cursor-pointer mb-5">1 Earlier Message</p> --}}
                            <!-- Email View-->

                            @forelse ($thread->messages as $message)
                                <div class="card email-card-last mx-sm-4 mx-3 mt-4 border">
                                    <div
                                        class="card-header d-flex justify-content-between align-items-center flex-wrap border-bottom">
                                        <div class="d-flex align-items-center mb-sm-0 mb-3">
                                            <img src="../../assets/img/avatars/1.png" alt="user-avatar"
                                                class="flex-shrink-0 rounded-circle me-2" height="38"
                                                width="38" />
                                            <div class="flex-grow-1 ms-1">
                                                <h6 class="m-0">{{ $message->sender->name }}</h6>
                                                <small class="text-muted">{{ $message->sender->email }}</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="mb-0 me-3 text-muted">{{ $message->created_at }}</small>
                                            <i class="bx bx-paperclip cursor-pointer me-2 bx-sm"></i>
                                            <i class="email-list-item-bookmark bx bx-star cursor-pointer me-2 bx-sm"></i>
                                            <div class="dropdown me-3">
                                                <button class="btn p-0" type="button" id="dropdownEmailTwo"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded bx-sm"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownEmailTwo">
                                                    <a class="dropdown-item scroll-to-reply" href="javascript:void(0)">
                                                        <i class="bx bx-share me-1"></i>
                                                        <span class="align-middle">Reply</span>
                                                    </a>
                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                        <i class="bx bx-share me-1 scaleX-n1 scaleX-n1-rtl"></i>
                                                        <span class="align-middle">Forward</span>
                                                    </a>
                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                        <i class="bx bx-info-circle me-1"></i>
                                                        <span class="align-middle">Report</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-3">
                                        {{ $message->body }}
                                    </div>
                                </div>
                            @empty
                            @endforelse

                            <!-- Email View : Reply mail-->
                            <div class="email-reply card mt-4 mx-sm-4 mx-3 border">
                                <h6 class="card-header border-0">Reply to {{ $thread->messages->first()->sender->name }}
                                </h6>
                                <div class="card-body pt-0 px-3">
                                    <form name="reply-form" id="reply-form">
                                        @csrf
                                        <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                                        <input type="hidden" name="receiver_id" value="{{ $thread->messages->first()->sender->id }}">
                                        <input type="hidden" name="subject" value="{{ $thread->messages->first()->subject }}">
                                        <div class="email-compose-message">
                                            <div class="email-editor border-0 border-top">
                                                <textarea name="body" class="form-control border-0 shadow-none" id="email_body" cols="30" rows="10">Write your message....</textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center">
                                            <div class="cursor-pointer me-3">
                                                <i class="bx bx-paperclip"></i>
                                                <span class="align-middle">Attachments</span>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bx bx-paper-plane me-1"></i>
                                                <span class="align-middle">Send</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- Email View -->
                </div>
            </div>

            <!-- Compose Email -->
            @include('user.message.layouts.compose')
            <!-- /Compose Email -->
        </div>
    </div>
@endsection
@section('pageJS')
    <script src="{{ asset('assets/js/app-email.js') }}"></script>
@endsection
@section('js')
    <script>
        $("#reply-form").validate({
            rules: {
                body: {
                    required: true,
                }
            },
            messages: {
                body: {
                    required: "{{ __('validation.required', ['attribute' => 'body']) }}",
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function(form) {

                const formData = new FormData(form);
                $.ajax({
                    url: "{{ route('user.mail.reply') }}",
                    data: formData,
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        location.reload();
                    },
                    error: (err) => {
                        toastr.error(err.responseJSON.errors.error[0]);
                    },
                });
            }

        });
    </script>
@endsection
