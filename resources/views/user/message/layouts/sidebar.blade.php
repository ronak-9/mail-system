<div class="col app-email-sidebar border-end flex-grow-0" id="app-email-sidebar">
    <div class="btn-compost-wrapper d-grid">
        <button class="btn btn-primary btn-compose" data-bs-toggle="modal" data-bs-target="#emailComposeSidebar" id="emailComposeSidebarLabel">Compose</button>
    </div>
    <!-- Email Filters -->
    <div class="email-filters py-2">
        <!-- Email Filters: Folder -->
        <ul class="email-filter-folders list-unstyled pb-1">
            <li class="d-flex justify-content-between">
                <a href="{{ route('user.mail.index') }}" class="d-flex flex-wrap align-items-center">
                    <i class="bx bx-envelope"></i>
                    <span class="align-middle ms-2">Inbox</span>
                </a>
                <div class="badge bg-label-primary rounded-pill">21</div>
            </li>
            <li class="d-flex">
                <a href="{{ route('user.mail.sent') }}" class="d-flex flex-wrap align-items-center">
                    <i class="bx bx-send"></i>
                    <span class="align-middle ms-2">Sent</span>
                </a>
            </li>
            <li class="d-flex justify-content-between">
                <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
                    <i class="bx bx-edit"></i>
                    <span class="align-middle ms-2">Draft</span>
                </a>
                <div class="badge bg-label-warning rounded-pill">1</div>
            </li>
            <li class="d-flex">
                <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
                    <i class="bx bx-star"></i>
                    <span class="align-middle ms-2">Starred</span>
                </a>
            </li>
            <li class="d-flex justify-content-between">
                <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
                    <i class="bx bx-error-circle"></i>
                    <span class="align-middle ms-2">Spam</span>
                </a>
                <div class="badge bg-label-danger rounded-pill">6</div>
            </li>
            <li class="d-flex align-items-center">
                <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
                    <i class="bx bx-trash-alt"></i>
                    <span class="align-middle ms-2">Trash</span>
                </a>
            </li>
        </ul>

        <!-- Email Filters: Labels -->
        <div class="email-filter-labels">
            <small class="mx-4 text-uppercase text-muted">Labels</small>
            <ul class="list-unstyled mb-0">
                <li data-target="work">
                    <a href="javascript:void(0);">
                        <i class="badge badge-dot bg-success"></i>
                        <span class="align-middle ms-2">Work</span>
                    </a>
                </li>
                <li data-target="company">
                    <a href="javascript:void(0);">
                        <i class="badge badge-dot bg-primary"></i>
                        <span class="align-middle ms-2">Company</span>
                    </a>
                </li>
                <li data-target="important">
                    <a href="javascript:void(0);">
                        <i class="badge badge-dot bg-warning"></i>
                        <span class="align-middle ms-2">Important</span>
                    </a>
                </li>
                <li data-target="private">
                    <a href="javascript:void(0);">
                        <i class="badge badge-dot bg-danger"></i>
                        <span class="align-middle ms-2">Private</span>
                    </a>
                </li>
            </ul>
        </div>
        <!--/ Email Filters -->
    </div>
</div>
