@extends('layouts.app')

@section('app-title', 'ABU Mela')
@section('main-section')
    <div class="container">
        <div class="section section-data-tables">
            <!-- DataTables example -->
            <div class="row">

                <div class="col s12 m12 l12">
                    <div id="button-trigger" class="card card card-default scrollspy">
                        <div class="card-content">
                            <h4 class="card-title">Today's Mails</h4>
                            <div class="row">

                                <div class="col s12">
                                    <div class="table-responsive">
                                        <form action="{{ route('mail.print-mail') }}" method="post" target="_blank">
                                            @csrf
                                            <table width="50">
                                                {{--                                            <table id="page-length-option" class="display " role="grid" aria-describedby="page-length-option_info" style="width: 1067px;">--}}
                                                <thead>
                                                <tr>
                                                    <th style="min-width: 0px; width:70px">
                                                        <label>
                                                            {{--                                                        <input name="" id="select_all" type="checkbox" />--}}
                                                            <span>{{ __('SNO') }}</span>
                                                        </label>
                                                    </th>
                                                    <th style="min-width: 0px; width:80%">TITLE</th>
                                                    <th>DATE</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php  $sno = 1 ?>
                                                @foreach($today_mails as $mail)
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <input name="checkbox[]" class="checkbox" type="checkbox" value="{{ $mail->id }}" id="mail-{{ $mail->id }}" onclick="deSelectMail(this.value);">
                                                                <span>{{ $sno }}</span>
                                                            </label>
                                                        </td>
                                                        <td style="width:300px; overflow: hidden;">
                                                            <a href="#modal-mail" id="mail{{ $sno }}" class="modal-trigger">
                                                                {{ $mail->title }}
                                                            </a>
                                                        </td>
                                                        <td>{{ date('d/m/Y', strtotime($mail->created_at)) }}</td>
                                                    </tr>
                                                    <script>
                                                        $('#mail{{ $sno }}').click(function () {
                                                            getMailDetails('{{ $mail->id }}');
                                                        });

                                                        /*$("#mail-{{ $mail->id }}").click(function (){
                                                        selectMail('{{ $mail->id }}');
                                                    })*/
                                                    </script>
                                                    <?php $sno += 1 ?>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th style="min-width: 0px; width:40px">
                                                        {{--                                                    <input type="submit" value="Print">--}}
                                                    </th>
                                                    <th>TITLE</th>
                                                    <th>DATE</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            {{ $today_mails->links() }}
                                        </form>

                                        @include('inc.modal-script')

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- START RIGHT SIDEBAR NAV -->

    </div>



@endsection

