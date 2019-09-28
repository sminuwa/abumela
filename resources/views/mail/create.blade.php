@extends('layouts.app')

@section('app-title', 'ABU Mela')
@section('main-section')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">
                            <h4 class="card-title">Create new mail record</h4>
                        </div>
                        <div class="col s12 m8 l8  offset-m2 offset-l2">
                            <form action="{{ route('mail.store') }}" method="post" enctype="multipart/form-data">
                                @csrf()
                                <ul class="stepper linear" id="linearStepper">
                                    <li class="step active">
                                        <div class="step-title waves-effect">Mail Information</div>
                                        <div class="step-content">
                                            {{--script--}}
                                            <script src="{{asset('js/vendors.min.js')}}" type="text/javascript"></script>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input name="title" type="text"
                                                           placeholder="Mail Sender"
                                                           id="sender"
                                                           class="titleAutoComplete validate"
                                                           onkeyup="forceKeyPressUppercase(this);" required>
                                                    {{--<textarea name="title" type="text" rows="10" placeholder="Mail Title"
                                                              id="title" class="titleAutoComplete materialize-textarea validate"
                                                              --}}{{--onkeyup="forceKeyPressUppercase(this);"--}}{{--
                                                              required
                                                              ></textarea>--}}
                                                    <label for="title">Mail Title <span class="red-text">*</span></label>
                                                </div>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('input.titleAutoComplete').autocomplete({
                                                            data: {
                                                                @foreach($mails as $mail)
                                                                "{{ $mail->title }}": null,
                                                                @endforeach
                                                                "": null
                                                            },
                                                        });
                                                    });
                                                </script>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input name="reference" type="text" placeholder="Mail Reference"
                                                           id="reference" class="validate"
                                                           onkeyup="forceKeyPressUppercase(this);" >
                                                    <label for="reference">Reference</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input name="date" type="text" placeholder="Mail Date" id="date"
                                                           class="datepicker validate" >
                                                    <input name="created_at" type="hidden" value="{{ date('Y-m-d h:i:s') }}"
                                                           placeholder="Mail Date" id="created_at" readonly="readonly" required>
                                                    <label for="date">Date <span class="red-text">*</span></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <input name="sender" type="text" placeholder="Mail Sender" id="sender" class="senderAutoComplete validate" required>
                                                    <label for="sender">Sender <span class="red-text">*</span></label>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <input name="department" type="text" placeholder="Sender Department" id="department" class="senderAutoComplete2" >
                                                    <label for="department">Department</label>
                                                </div>

                                                <!--script for the auto complete-->
                                                <script>
                                                    $(document).ready(function(){
                                                        $('input.senderAutoComplete').autocomplete({
                                                            data: {
                                                                @foreach($senders as $sender)
                                                                "{{ $sender->name }}": null,
                                                                @endforeach
                                                                "": null
                                                            },
                                                        });
                                                    });

                                                    $(document).ready(function(){
                                                        $('input.senderAutoComplete2').autocomplete({
                                                            data: {
                                                                @foreach($senders as $sender)
                                                                "{{ $sender->department }}": null,
                                                                @endforeach
                                                                "": null
                                                            },
                                                        });
                                                    });

                                                </script>
                                            </div>
                                            {{--<div class="row">
                                                <div class="input-field col s12">

                                                    --}}{{--<label for="created_at">Date Received</label>--}}{{--
                                                </div>
                                            </div>--}}

                                            <div class="step-actions">
                                                <div class="row">
                                                    <div class="col m6 s12 mb-3">
                                                        <button class="btn btn-light previous-step" disabled>
                                                            <i class="material-icons left">arrow_back</i>
                                                            Prev
                                                        </button>
                                                    </div>
                                                    <div class="col m6 s12 mb-3">
                                                        <button class="waves-effect waves dark btn btn-primary next-step"
                                                                type="submit">
                                                            Next
                                                            <i class="material-icons right">arrow_forward</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="step">
                                        <div class="step-title waves-effect">Comments / Minutes (if any)</div>
                                        <div class="step-content">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <textarea name="comment" type="text" rows="10" placeholder="Write the comments or minutes"
                                                              id="comment" class="materialize-textarea"></textarea>
                                                    <label for="comment">Write the comments / minutes</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input name="from" type="text" placeholder="Received from" id="who_comment"
                                                           class="">
                                                    <label for="who_comment">Received From</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="to" type="text" placeholder="Forwarded to" id="who_comment"
                                                           class="">
                                                    <label for="who_comment">Forwarded To</label>
                                                </div>
                                            </div>

                                            <div class="step-actions">
                                                <div class="row">
                                                    <div class="col m6 s12 mb-3">
                                                        <button class="btn btn-light previous-step">
                                                            <i class="material-icons left">arrow_back</i>
                                                            Prev
                                                        </button>
                                                    </div>
                                                    <div class="col m6 s12 mb-3">
                                                        <button class="waves-effect waves dark btn btn-primary next-step"
                                                                type="submit">
                                                            Next
                                                            <i class="material-icons right">arrow_forward</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step">
                                        <div class="step-title waves-effect">Scan and upload mails</div>
                                        <div class="step-content">
                                            <div class="row">
                                                <div id="pages_to_upload"></div>
                                            </div>
                                            <div class="row">
                                                <div class="file-field input-field">
                                                    <div class="btn">
                                                        <span>File</span>
                                                        <input name="file" type="file" class="file" id="file" multiple>


                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                                    </div>
                                                </div>
                                            </div>

                                            {{--Preview mail goes here--}}
                                            <div class="row">

                                                <div id="preview_mail_div">

                                                </div>


                                                {{--<div style="width:50px;height: 50px; border: 1px solid whitesmoke ;text-align: center;position: relative" id="image">
                                                    <img width="100" id="preview_image" />
                                                    <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
                                                </div>--}}
                                                
                                            </div>
                                           {{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"
                                                    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
                                            <script src="https://use.fontawesome.com/2c7a93b259.js"></script>--}}
                                            <script>

                                                $('#file').change(function () {
                                                    if ($(this).val() != '') {
                                                        upload(this);
                                                    }
                                                });
                                                function upload(img) {
                                                    var form_data = new FormData();
                                                    form_data.append('file', img.files[0]);
                                                    form_data.append('_token', '{{csrf_token()}}');
                                                    $('#loading').css('display', 'block');
                                                    $.ajax({
                                                        url: "{{url('document-upload-with-ajax')}}",
                                                        data: form_data,
                                                        type: 'POST',
                                                        contentType: false,
                                                        processData: false,
                                                        success: function (data) {
                                                            if (data.fail) {
                                                                $('#preview_mail_div').attr('src', '{{asset('images/noimage.jpg')}}');
                                                                alert(data.errors['file']);
                                                            }
                                                            else {
                                                                $('#file_name').val(data);
                                                                {{--$('#preview_image').attr('src', '{{asset('mails')}}/' + data);--}}
                                                                $('#preview_mail_div').html(data);
                                                            }
                                                            $('#loading').css('display', 'none');
                                                        },
                                                        error: function (xhr, status, error) {
                                                            alert(xhr.responseText);
                                                            $('#preview_mail_div').attr('src', '{{asset('images/noimage.jpg')}}');
                                                        }
                                                    });
                                                }
                                                function removeFile() {
                                                    if ($('#file_name').val() != '')
                                                        if (confirm('Are you sure want to remove profile picture?')) {
                                                            $('#loading').css('display', 'block');
                                                            var form_data = new FormData();
                                                            form_data.append('_method', 'DELETE');
                                                            form_data.append('_token', '{{csrf_token()}}');
                                                            $.ajax({
                                                                url: "ajax-remove-image/" + $('#file_name').val(),
                                                                data: form_data,
                                                                type: 'POST',
                                                                contentType: false,
                                                                processData: false,
                                                                success: function (data) {
                                                                    $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                                                                    $('#file_name').val('');
                                                                    $('#loading').css('display', 'none');
                                                                },
                                                                error: function (xhr, status, error) {
                                                                    alert(xhr.responseText);
                                                                }
                                                            });
                                                        }
                                                }
                                            </script>
                                            {{--end of preview mail--}}

                                            <div class="step-actions">
                                                <div class="row">
                                                    <div class="col m6 s6 mb-1">
                                                        <button class="btn btn-light previous-step">
                                                            <i class="material-icons left">arrow_back</i>
                                                            Prev
                                                        </button>
                                                    </div>
                                                    <div class="col m6 s6 mb-1">
                                                        <button class="waves-effect waves-dark btn btn-primary"
                                                                type="submit">Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


