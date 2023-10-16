<script>
    // const email_body = new Quill(".email-editor", {
    //     // modules: {
    //     //     toolbar: ".email-editor-toolbar"
    //     // },
    //     placeholder: "Message... ",
    //     theme: "snow"
    // });

    $("#email-compose-form").validate({
        rules: {
            receiver_id: {
                required: true,
            },
            subject: {
                required: true,
                maxlength: 255,
            },
            body:{
                required: true,
            }
        },
        messages: {

            receiver_id: {
                required: "{{ __('validation.required', ['attribute' => 'to']) }}",
            },
            subject: {
                required: "{{ __('validation.required', ['attribute' => 'subject']) }}",
                maxlength: "{{ __('validation.max.string', ['attribute' => 'password', 'max' => 255]) }}"
            },
            body:{
                required: "{{ __('validation.required', ['attribute' => 'body']) }}",
            }

        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        submitHandler: function(form) {

            const formData = new FormData(form);
            $.ajax({
                url: "{{ route('user.mail.send') }}",
                data: formData,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: (response) => {
                    form.reset();
                    toastr.success("{{ __('message.mail.sentSuccess') }}");
                    $('#compose-close-btn').click();
                },
                error: (err) => {
                    toastr.error(err.responseJSON.errors.error[0]);
                },
            });
        }

    });
    $(document).on('click', '#emailComposeSidebarLabel', function(e) {
        $.ajax({
            url: "{{ route('user.get') }}",
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            success: (response) => {
                let option = '';
                response.data.forEach(user => {
                    option += '<option value="' + user.id + '">' + user.email + '</option>';
                });
                $("#emailContacts").html(option);

            },
            error: (err) => {
                toastr.error("{{ __('message.serverError') }}");
            },
        });

    });
</script>
