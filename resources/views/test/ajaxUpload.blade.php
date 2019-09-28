@extends('dashboard.layout.app')

@section('app-title', 'ABU Mela')
@section('main-section')

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <h4 class="card-title">Ajax Uploader</h4>
                    </div>
                    <div class="col s12 m12 l12 ">
                        <div class="col col12">
                            <span id="message">Hello</span>
                        </div>
                        <form method="post" id="upload_form" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="col8">
                                <input type="file" id="select_file" name="select_file" >
                                <input type="submit" id="upload" name="upload" value="Upload">
                            </div>

                            <div style="height:40px;"></div>
                        </form>
                    </div>
                    <div class="col col12">
                        <div class="alert-info" id="uploaded_image">Hi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#upload_form').on('submit', function(event){
               event.preventDefault();

               $.ajax({
                   url: "{{ route('ajaxUpload.action') }}",
                   method: "POST",
                   data: new FormData(this),
                   type: "JSON",
                   contentType: false,
                   cache: false,
                   processDate: false,
                   beforeSend: function(){
                       $('#message').html('display', 'block');
                       $('#uploaded_image').html("Waiting");
                   },
                   success: function (data) {
                       // $('#message').css('display', 'block');
                       // $('#message').html(data.message);
                       $('#message').addClass(data.class_name);
                       $('#uploaded_image').html(data.uploaded_image);

                   }
               })
            });
        });
    </script>

@endsection
