<script>
    function getCheckedMails(mail) {
        $("#check-info").append(mail + ',');

        let check_info = $("#check-info").html();
        let n = [check_info];
        alert(n[0]);
    }
    /*function getUnCheckedMails(mail){
        mail = [mail, 4];
        alert(mail);
    }*/
    function select_all() {
        let select_all = document.getElementById("select_all"); //select all checkbox
        let checkboxes = document.getElementsByClassName("checkbox"); //checkbox items
        //select all checkboxes
        select_all.addEventListener("change", function (e) {
            for (let i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = select_all.checked;
            }
        });
        for (let i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener('change', function (e) { //".checkbox" change
                //uncheck "select all", if one of the listed checkbox item is unchecked
                if (this.checked == false) {
                    select_all.checked = false;
                }
                //check "select all" if all checkbox items are checked
                if (document.querySelectorAll('.checkbox:checked').length == checkboxes.length) {
                    select_all.checked = true;
                }
            });
        }
    }

    function deSelectMail(mail) {
        if ($("#mail-" + mail).prop("checked") == true) {
            let url = "{{url('select-mail')}}/" + mail;
            $.ajax({
                url: url,
                data: mail,
                type: 'GET',
                contentType: false,
                processData: false,
                beforeSend: function () {
                    // alert(mail);
                },
                success: function (data) {
                    // alert(data);
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            })
        } else if ($("#mail-" + mail).prop("checked") == false) {
            let url = "{{url('de-select-mail')}}/" + mail;
            $.ajax({
                url: url,
                data: mail,
                type: 'GET',
                contentType: false,
                processData: false,
                beforeSend: function () {
                    // alert(mail);
                },
                success: function (data) {
                    // alert(data);
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            })
        }
    }

    select_all();

    function getMailDetails(mail) {
        /*fetching mail details*/
        let url = "{{url('get-mail-details')}}/" + mail;
        $.ajax({
            url: url,
            data: mail,
            type: 'GET',
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#modal-mail-title").html('<img src="{{asset('images/ajax-loader.gif')}}" width="25" />');
                $("#modal-mail-reference").html('<img src="{{asset('images/ajax-loader.gif')}}" width="25" />');
                $("#modal-mail-status").html('<img src="{{asset('images/ajax-loader.gif')}}" width="25" />');
                $("#modal-mail-date").html('<img src="{{asset('images/ajax-loader.gif')}}" width="25" />');
                $("#modal-mail-created_at").html('<img src="{{asset('images/ajax-loader.gif')}}" width="25" />');
                $("#modal-mail-sender").html('<img src="{{asset('images/ajax-loader.gif')}}" width="25" />');
                $("#modal-mail-department").html('<img src="{{asset('images/ajax-loader.gif')}}" width="25" />');
                // $("#modal-mail-title-preview").html(obj.title);
                $("#modal-mail-document-preview").html('<img src="{{asset('images/ajax-loader.gif')}}" width="25" />');
            },
            success: function (data) {
                let obj = JSON.parse(data);
                $("#modal-mail-title").html(obj.title);
                $("#modal-mail-reference").html(obj.reference);
                $("#modal-mail-status").html(obj.status);
                $("#modal-mail-date").html(obj.date);
                $("#modal-mail-created_at").html(obj.created_at);
                $("#modal-mail-sender").html(obj.sender.name);
                $("#modal-mail-department").html(obj.sender.department);
                // $("#modal-mail-title-preview").html(obj.title);
                /*$("#modal-mail-document-preview").html("" +
                    "<a href='{{asset('mails')}}/" + obj.documents.name + "' target='_blank'>" +
                    "<img src='{{asset('mails')}}/" + obj.documents.name + "' alt='img25'/>" +
                    "</a>");*/
                // $("#modal-mail-test-data").html(data)
                // $("#modal-mail-title").html(data)

                $("#modal-form-reply-div").html('' +
                    '<form action="{{url("save-mail-reply")}}" method="post" id="reply-mail-form"> @csrf ' +
                    '<div class="row">' +
                    '<div class="input-field col s12">' +
                    '<textarea name="comment" type="text" rows="10" id="comment" class="materialize-textarea"></textarea>' +
                    '<label for="comment">Write the comments / minutes</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="input-field col s6">' +
                    '<input name="from" type="text" id="from" class="">' +
                    '<label for="who_comment">From</label>' +
                    '</div>' +
                    '<div class="input-field col s6">' +
                    '<input name="to" type="text" id="to" class="">' +
                    '<label for="who_comment">To</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="input-field col m12 s12">' +
                    '<p>' +
                    '<label>' +
                    '<input name="status" id="status-in" type="radio" value="in" checked/>' +
                    '<span>Incoming</span>' +
                    '</label>' +
                    '</p>' +
                    '<p>' +
                    '<label>' +
                    '<input name="status" id="status-out" type="radio" />' +
                    '<span>Outgoing</span>' +
                    '</label>' +
                    '</p>' +
                    '<button type="submit" id="sender" class="btn btn-success"> Forward</button' +
                    '</div>' +
                    '</div>' +
                    '</form>' +
                    '').hide();

                function status_check() {
                    let status = "";
                    if ($('#status-in').is(':checked')) {
                        status = 'in';
                    } else if ($('#status-out').is(':checked')) {
                        status = 'out';
                    } else {
                        status = '';
                    }
                    return status;
                }

                /*$("#status-in").click(function(){
                    alert(status_check());
                });*/
                $("#reply-mail-form").submit(function (e) {
                    // status = 'in';
                    e.preventDefault();
                    $.ajax({
                        url: "{{url('save-mail-reply')}}",
                        data: {
                            _token: "{{csrf_token()}}",
                            id: mail,
                            comment: $("#comment").val(),
                            received_from: $("#from").val(),
                            forwarded_to: $("#to").val(),
                            status: status_check(),
                        },
                        type: 'POST',
                        // contentType: false,
                        // processData: false,
                        beforeSend: function () {
                            $("#modal-form-reply-div").slideUp();
                        },
                        success: function (data) {
                            /*deleting the fields*/
                            $("#comment").val('');
                            $("#from").val('');
                            $("#to").val('');
                            alert(data);
                            getMailDetails(obj.id);
                        },
                        error: function (xhr, status, error) {
                            alert(xhr.responseText);
                        }
                    })
                })
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
        /*fetching comments*/
        let url_comments = "{{url('get-mail-comments')}}/" + mail;
        $.ajax({
            url: url_comments,
            data: mail,
            type: 'GET',
            contentType: false,
            processData: false,
            beforeSend: function () {
                // alert('Hello')
                // $("#modal-mail-document-preview").html('');
                $("#modal-mail-comments-div").html('<img src="{{asset('images/ajax-loader.gif')}}" width="25" />');
            },
            success: function (data) {
                $("#modal-mail-comments-div").html('');
                let obj = JSON.parse(data);
                /*checking if array is multidimensional*/
                if (obj[0].constructor === Array) {
                    alert(obj.comment)
                } else {
                    lNumber = 0;
                    for (let i = 0; i < obj.length; ++i) {
                        // do something with `substr[i]`
                        // alert(obj[i].comment)
                        $("#modal-mail-comments-div").append(
                            '<li class="collection-item avatar">' +
                            '  <img src="{{asset('images/avatar/avatar-7.png')}}" alt="" class="circle">' +
                            '  <p class="font-weight-600"> ' + obj[i].received_from + ' &#8594 ' + obj[i].forwarded_to + '  </p>' +
                            '  <p class="font-weight-100"> ' + obj[i].comment + ' </p>' +
                            '  <p class="medium-small">' + obj[i].created_at + '</p>' +
                            '</li>'
                        );
                    }
                }
                // $("#modal-mail-title-preview").html(obj.title);
                // $("#modal-mail-title").html(data)
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
        /*mail current location*/
        let url_location = "{{url('get-current-mail-location')}}/" + mail;
        $.ajax({
            url: url_location,
            data: mail,
            type: 'GET',
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#modal-mail-forwarded-to').html('<img src="{{asset('images/ajax-loader.gif')}}" width="25" />');
                $('#modal-mail-forwarded-at').html('<img src="{{asset('images/ajax-loader.gif')}}" width="25" />')
            },
            success: function (data) {
                let obj = JSON.parse(data);
                $('#modal-mail-forwarded-to').html(obj.forwarded_to);
                $('#modal-mail-forwarded-at').html(obj.created_at)
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
        /*get mail documents*/
        let url_documents = "{{url('get-mail-documents')}}/" + mail;
        $.ajax({
            url: url_documents,
            data: mail,
            type: 'GET',
            contentType: false,
            processData: false,
            beforeSend: function () {
                // alert('Hello')
                // $("#modal-mail-title-preview").html(obj.title);
                // $("#modal-mail-document-preview").html('');
                $("#modal-mail-document-preview").html('<img src="{{asset('images/ajax-loader.gif')}}" width="25" />');
            },
            success: function (data) {
                $("#modal-mail-document-preview").html('');
                let obj = JSON.parse(data);
                /*checking if array is multidimensional*/
                if (obj[0].constructor === Array) {
                    // alert(obj.name)
                } else {
                    for (let i = 0; i < obj.length; ++i) {
                        // do something with `substr[i]`
                        // alert(obj[i].comment)
                        $("#modal-mail-document-preview").append("" +
                            "<div class='col m6 l6 s12'> " +
                            "<a href='{{asset('mails')}}/" + obj[i].name + "' target='_blank'>" +
                             " Page " + (i + 1) + " </a> <br><br>" +
                            "</div>"
                        );
                    }
                }
                // $("#modal-mail-title-preview").html(obj.title);
                // $("#modal-mail-title").html(data)
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
</script>
