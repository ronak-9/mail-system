@extends('layouts.master')
@section('title', 'Mail')
@section('pageCSS')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-email.css') }}">
    <style>

    </style>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="app-email card">
            <div class="border-0">
                <div class="row g-0">
                    <!-- Email Sidebar -->
                    @include('user.message.layouts.sidebar')
                    <!--/ Email Sidebar -->

                    <!-- Emails List -->
                    <div class="col app-emails-list">
                        <div class="card shadow-none border-0">
                            <div class="card-body emails-list-header p-3 py-lg-3 py-2">
                                <!-- Email List: Search -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center w-100">
                                        <i class="bx bx-menu bx-sm cursor-pointer d-block d-lg-none me-3"
                                            data-bs-toggle="sidebar" data-target="#app-email-sidebar" data-overlay></i>
                                        <div class="mb-0 mb-lg-2 w-100">
                                            <div class="input-group input-group-merge shadow-none">
                                                <span class="input-group-text border-0 ps-0 py-0" id="email-search">
                                                    <i class="bx bx-search fs-4 text-muted"></i>
                                                </span>
                                                <input type="text" class="form-control email-search-input border-0 py-0"
                                                    placeholder="Search mail" aria-label="Search..."
                                                    aria-describedby="email-search" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-0 mb-md-2">
                                        <i
                                            class="bx bx-refresh scaleX-n1-rtl cursor-pointer email-refresh me-2 bx-sm text-muted"></i>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="emailsActions"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded bx-sm text-muted"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="emailsActions">
                                                <a class="dropdown-item" href="javascript:void(0)">Mark as read</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Mark as unread</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Archive</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3 emails-list-header-hr" />
                                <!-- Email List: Actions -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="form-check me-2">
                                            <input class="form-check-input" type="checkbox" id="email-select-all" />
                                            <label class="form-check-label" for="email-select-all"></label>
                                        </div>
                                        <i class="bx bx-trash-alt email-list-delete cursor-pointer me-3 fs-4"></i>
                                        <i class="bx bx-envelope email-list-read cursor-pointer me-3 fs-4"></i>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="dropdownMenuFolderOne"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-folder bx bx-folder fs-4 me-3"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="dropdownMenuFolderOne">
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
                                            <button class="btn p-0" type="button" id="dropdownLabelOne"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-label fs-4 me-3"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLabelOne">
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
                                                <a class="dropdown-item" href="javascript:void(0)">
                                                    <i class="badge badge-dot bg-danger me-1"></i>
                                                    <span class="align-middle">Private</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="email-pagination d-sm-flex d-none align-items-center flex-wrap justify-content-between justify-sm-content-end">
                                        <span
                                            class="d-sm-block d-none mx-3 text-muted">{{ $messages->firstItem() }}-{{ $messages->lastItem() }}
                                            of {{ $messages->total() }}</span>
                                        <i
                                            class="email-prev bx bx-chevron-left scaleX-n1-rtl cursor-pointer text-muted me-4 fs-4"></i>
                                        <i class="email-next bx bx-chevron-right scaleX-n1-rtl cursor-pointer fs-4"></i>
                                    </div>
                                </div>
                            </div>
                            <hr class="container-m-nx m-0" />
                            <!-- Email List: Items -->
                            <div class="email-list pt-0">
                                <ul class="list-unstyled m-0">
                                    @forelse ($messages as $message)
                                        <li class="email-list-item
                                        @if ($message->is_read) email-marked-read @endif
                                        "
                                            data-trash="true" data-bs-toggle="sidebar" data-target="#app-email-view">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check">
                                                    <input class="email-list-item-input form-check-input" type="checkbox"
                                                        id="email-6" />
                                                    <label class="form-check-label" for="email-6"></label>
                                                </div>
                                                <i
                                                    class="email-list-item-bookmark bx bx-star d-sm-inline-block d-none cursor-pointer mx-4 bx-sm" data-id="{{ $message->id }}"  data-mark="{{ $message->is_marked }}"></i>
                                                <div class="avatar avatar-sm d-block flex-shrink-0 me-sm-3 me-0">
                                                    <span
                                                        class="avatar-initial rounded-circle bg-label-info">{{ substr($message->sender->name, 0, 2) }}</span>
                                                </div>
                                                <div class="email-list-item-content ms-2 ms-sm-0 me-2"
                                                    data-thread={{ $message->thread_id }}
                                                    data-message="{{ $message->id }}">
                                                    <span
                                                        class="email-list-item-username me-2 h6">{{ $message->sender->name }}</span>
                                                    <span
                                                        class="email-list-item-subject d-xl-inline-block d-block">{{ $message->subject }}</span>
                                                </div>
                                                <div class="email-list-item-meta ms-auto d-flex align-items-center">
                                                    <span
                                                        class="email-list-item-label badge badge-dot bg-info d-none d-md-inline-block me-2"
                                                        data-label="work"></span>
                                                    <small
                                                        class="email-list-item-time text-muted">{{ $message->created_at }}</small>
                                                    <ul class="list-inline email-list-item-actions">
                                                        <li class="list-inline-item email-delete"><i
                                                                class="bx bx-trash-alt fs-4"></i></li>
                                                        @if ($message->is_read)
                                                            <li class="list-inline-item email-unread email-read-toggle"
                                                                data-id="{{ $message->id }}"
                                                                data-read="{{ $message->is_read }}"><i
                                                                    class="bx bx-envelope-open fs-4"></i></li>
                                                        @else
                                                            <li class="list-inline-item email-read email-read-toggle"
                                                                data-id="{{ $message->id }}"
                                                                data-read="{{ $message->is_read }}"><i
                                                                    class="bx bx-envelope fs-4"></i></li>
                                                        @endif

                                                        <li class="list-inline-item"><i
                                                                class="bx bx-error-circle fs-4"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <li class="email-list-empty text-center d-none">No items found.</li>
                                    @endforelse

                                </ul>

                            </div>
                        </div>
                        <div class="app-overlay"></div>
                    </div>
                    <!-- /Emails List -->


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
    @include('user.message.layouts.compose_js')

@endsection
@section('js')
    <script>

            $(document).on('click', '.email-list-item-content', function(e) {
                e.preventDefault();
                const id = $(this).data('thread');
                const message = $(this).data('message');
                const url = "{{ route('user.mail.view', ['id' => ':id', 'message' => ':message']) }}"
                    .replace(':id', id)
                    .replace(':message', message);
                location.href = url;
            });

            $(document).on('click', '.email-read-toggle', function(e) {
                e.preventDefault();
                const id = $(this).data('message');
                const url = "{{ route('user.mail.marked.read.toggle', ['id' => ':id']) }}".replace(':id',id);
                const read = $(this).data('read');
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "PUT",
                        is_read: read,
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (response) => {

                    },
                    error: (err) => {
                        toastr.error("{{ __('message.serverError') }}");
                    },
                });
            });

            $(document).on('click', '.email-list-item-bookmark', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const url = "{{ route('user.mail.marked.toggle', ['id' => ':id']) }}".replace(':id',id);
                const marked = $(this).data('marked');
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "PUT",
                        is_marked: marked,
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (response) => {

                    },
                    error: (err) => {
                        toastr.error("{{ __('message.serverError') }}");
                    },
                });
            });
    </script>
@endsection
