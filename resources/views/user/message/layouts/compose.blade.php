<div class="app-email-compose modal" id="emailComposeSidebar" tabindex="-1" aria-labelledby="emailComposeSidebarLabel" aria-hidden="true">
    <div class="modal-dialog m-0 me-md-4 mb-4 modal-lg">
        <div class="modal-content p-0">
            <div class="modal-header py-3 bg-body">
                <h5 class="modal-title fs-5">Compose Mail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="compose-close-btn"></button>
            </div>
            <div class="modal-body flex-grow-1 pb-sm-0 p-4 py-2">
                <form class="email-compose-form" id="email-compose-form">
                    @csrf
                    <div class="email-compose-to d-flex justify-content-between align-items-center">
                        <label class="form-label mb-2" for="emailContacts">To:</label>
                        <div class="select2-primary border-0 shadow-none flex-grow-1 mx-2">
                            <select class="select2 select-email-contacts form-select" id="emailContacts" name="receiver_id">
                            </select>
                        </div>
                        <div class="email-compose-toggle-wrapper mb-2">
                            <a class="email-compose-toggle-cc text-body" href="javascript:void(0);">Cc |</a>
                            <a class="email-compose-toggle-bcc text-body" href="javascript:void(0);">Bcc</a>
                        </div>
                    </div>

                    <div class="email-compose-cc d-none">
                        <hr class="mx-n4 my-2" />
                        <div class="d-flex align-items-center">
                            <label for="email-cc" class="form-label mb-0">Cc:</label>
                            <input type="text" class="form-control border-0 shadow-none flex-grow-1 mx-2" id="email-cc" placeholder="someone@email.com" />
                        </div>
                    </div>
                    <div class="email-compose-bcc d-none">
                        <hr class="mx-n4 my-2" />
                        <div class="d-flex align-items-center">
                            <label for="email-bcc" class="form-label mb-0">Bcc:</label>
                            <input type="text" class="form-control border-0 shadow-none flex-grow-1 mx-2" id="email-bcc" placeholder="someone@email.com" />
                        </div>
                    </div>
                    <hr class="mx-n4 my-0" />
                    <div class="email-compose-subject d-flex align-items-center my-1">
                        <label for="email-subject" class="form-label mb-0">Subject:</label>
                        <input type="text" class="form-control border-0 shadow-none flex-grow-1 mx-2" id="email-subject" name="subject" />
                    </div>

                    <div class="email-compose-message mx-n4">
                        <div class="email-editor border-0 border-top">
                            <textarea name="body" class="form-control border-0 shadow-none" id="email_body" cols="30" rows="10">Write your message....</textarea>
                        </div>
                    </div>
                    <hr class="mx-n4 mt-0 mb-2" />
                    <div class="email-compose-actions d-flex justify-content-between align-items-center my-2 py-1">
                        <div class="d-flex align-items-center">
                            <div class="btn-group">
                                <input type="submit" class="btn btn-primary" value="Send"/>
                                {{-- <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:void(0);">Schedule send</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Save draft</a></li>
                                </ul> --}}
                            </div>
                            <label for="attach-file"><i class="bx bx-paperclip cursor-pointer ms-2"></i></label>
                            <input type="file" name="file-input" class="d-none" id="attach-file" />
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="dropdownMoreActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMoreActions">
                                    <li><button type="button" class="dropdown-item">Add Label</button></li>
                                    <li><button type="button" class="dropdown-item">Plain text mode</button></li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li><button type="button" class="dropdown-item">Print</button></li>
                                    <li><button type="button" class="dropdown-item">Check Spelling</button></li>
                                </ul>
                            </div>
                            <button type="reset" class="btn" data-bs-dismiss="modal" aria-label="Close"><i class="bx bx-trash-alt"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
