<?php
//date
$Today = date('y:m:d');
$TodayDate = date('F d, Y', strtotime($Today));

?>

    <!DOCTYPE html>
<!-- saved from url=(0049)https://forms.abu.edu.ng/otherforms/printform.php -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>Incoming Mails</title>
    <!-- CSS Imports -->
    <link href="{{asset('css/css3buttons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/centeredmenu.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/print.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('js/SpryTabbedPanels.js')}}" type="text/javascript"></script>
    <link href="{{asset('css/SpryTabbedPanels.css')}}" rel="stylesheet" type="text/css">
    <style>

        .style1 {
            color: #1ab394
        }

        .style4 {
            font-size: 24px
        }

        .style6 {
            font-weight: bold;
            font-size: 14px;
            color: #000000;
        }

        .style7 {
            font-size: 16px
        }


        @media print {
            @page {
                size: landscape
            }
        }
    </style>

</head>

<body onload="print();">

<div id="page">
    <div id="main">
        <table width="100%" height="112" border="0" cellpadding="0" cellspacing="0">
            <tbody>

            <tr>
                <td width="10%" height="112" style="border:none;border-bottom: 2px #1ab394 solid;">
                    <h1 align="center" class="style1">
                        <small><img src="{{asset('images/logo/printlogo.png')}}" width="126" height="128"></small>
                    </h1>
                </td>
                <td width="79%" style="border:none;border-bottom: 2px #1ab394 solid;">
                    <h1 align="center" class="style1">
                        <small>OFFICE OF THE BURSAR</small>
                    </h1>
                    <h2 align="center" class="style1">AHMADU
                        BELLO UNIVERSITY, ZARIA
                    </h2>
                    <h1 align="center" class="style6 style7">INCOMING / OUTGOING MAILS</h1></td>
                <td width="11%" style="border:none;border-bottom: 2px #1ab394 solid;">
                    <small><img src="{{asset('images/logo/printlogo.png')}}" width="126" height="128"></small>
                </td>
            </tr>
            </tbody>
        </table>
        <div style="width: 950px; margin: 30px auto;">
            <h4 class="style1" style="text-align: center;">DISPATCHED MAILS
                ON <?php echo $TodayDate; ?><span
                    class="style1" style="text-align: center;"> </span></h4>
            <!--<h3 align="center">(Completed And Submitted On January , )</h3> -->
            <table style="width: 100%;">
                <thead>
                <tr>
                    <td width="30"><strong>S/No.</strong></td>
                    <td width="172"><strong>REFERENCE NO.</strong></td>
                    <td width="184"><strong>TITLE</strong></td>
                    <td width="119"><strong>DEPARTMENT</strong></td>
                    <td width="120"><strong>DATE RECIEVED</strong></td>
                </tr>
                </thead>
                <tbody>

                @if(isset($mails) && !empty($mails))
                    <?php $sno = 1; ?>
                    @foreach($mails as $mail)
                        <tr>
                            <td>{{ $sno }}</td>
                            <td>{{ $mail->reference }}</td>
                            <td>{{ $mail->title }}</td>
                            <td>{{ strtoupper($mail->department)}}</td>
                            <td>{{ date('d-m-Y', strtotime($mail->created_at)) }}</td>
                        </tr>
                        <?php $sno += 1; ?>
                    @endforeach
                @endif
                </tbody>
            </table>
            <h3 align="center" class="style1">SIGNED: {{ Auth::user()->fullname }}</h3>
            <p align="center">For Bursar </p>
        </div>
    </div>


    <div class="clear"></div>
    <div class="footer" style="width: 100%; clear: both;border-bottom: 2px #1ab394 solid;">
        <div class="footerMenus">
            <div class="footerGroup" style="width:50%">
                <strong>Forward your complains to <span style="color:#3333e0; font-size:1.25em;text-align:center">bursar@abu.edu.ng</span></strong>
            </div>
        </div>
        <span style="width: 40%; position: relative; float: left; text-align: center;">

        <div
            style="float: right; height: 20px;  padding-right: 5px; padding-left: 5px;">Ahmadu Bello University, Zaria</div>
    </span>
    </div>
</div>


</body>
</html>
