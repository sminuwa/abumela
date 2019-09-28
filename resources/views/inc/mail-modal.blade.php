<div id="modal-mail" class="modal bottom-sheet" style="max-height: 100%; height:100%;">
    {{--    <div> <div class="right">Hello</div></div>--}}

    <div class="modal-content">
        <div class="right">
            <a href="#" onclick="$('#modal-form-reply-div').toggle('slide');" class="btn mb-1 waves-effect waves-light btn-small teal darken-4" type="submit" name="action"><i class="material-icons left">reply</i></a>
            {{--<a href="#" class="btn mb-1 waves-effect waves-light btn-small teal accent-4" type="submit" name="action"><i class="material-icons left">edit</i></a>
            <a href="#" class="btn mb-1 waves-effect waves-light btn-small red darken-1" type="submit" name="action"><i class="material-icons left">delete</i></a>
            --}}
            <a href="javascript:;" onclick="$('#modal-mail').modal('close');" class="btn-floating mb-1 waves-effect waves-light red darken-1">
                <i class="material-icons">close</i>
            </a>
        </div>
        <h5 id="modal-mail-title">
            Mail Title
        </h5>

        <div class="row" style="margin:0;padding:0;">
            <div class="col l4 m4 s12">
                <div class="card card card-default">
                    <div class="card-content">
                        <h6>Mail Details</h6>
                        <hr>
                        <table class="striped table-bordered">

                            <tbody>

                            <tr>
                                <th><strong>Reference No</strong></th>
                                <td id="modal-mail-reference"></td>
                            </tr>
                            <tr>
                                <th><strong>Mail Current Status</strong></th>
                                <td id="modal-mail-status"></td>
                            </tr>
                            <tr>
                                <th><strong>Mail Date</strong></th>
                                <td id="modal-mail-date"></td>
                            </tr>
                            <tr>
                                <th><strong>Received From</strong></th>
                                <td id="modal-mail-sender"></td>
                            </tr>
                            <tr>
                                <th><strong>Department / Unit </strong></th>
                                <td id="modal-mail-department"></td>
                            </tr>
                            <tr>
                                <th><strong>Received At</strong></th>
                                <td id="modal-mail-created_at"></td>
                            </tr>
                            <tr>
                                <th><strong>Forwarded To</strong></th>
                                <td id="modal-mail-forwarded-to"></td>
                            </tr>
                            <tr>
                                <th><strong>Forwarded At</strong></th>
                                <td id="modal-mail-forwarded-at"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col l8 m8 s12">
                <div class="">
                    <div class="card-content">
                        <div class="row">
                            <div class="col l7 m7 s12">
                                <h6>Comments</h6>
                                <hr>

                                <div id="modal-form-reply-div">

                                </div>

                                <ul class="collection mb-0" id="modal-mail-comments-div">

                                </ul>

                                <div id="modal-mail-test-data"></div>
                            </div>
                            <div class="col l5 m5 s12">
                                <h6>Mail Preview</h6>
                                <hr>
                                <div class="col s12 m12 grid">
                                    <div id="modal-mail-document-preview"></div>
                                </div>
                                <div style="height: 50px;"></div>
                                <div class="row">
                                    <div class="col l12 m12 s12 grid">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

