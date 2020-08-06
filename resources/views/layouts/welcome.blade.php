<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/logo.png')}}" />
      <link rel="icon" type="image/png" href="{{asset('images/logo.png')}}" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>Solidarity Bond</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="viewport" content="width=device-width" />
      <!-- Bootstrap core CSS     -->
      <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
      <!--  Material Dashboard CSS    -->
      <link href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet" />
      <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />
      <!--     Fonts and icons     -->
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
      <link rel="stylesheet" type="text/css" href="{{asset('jqueryui/jquery-ui.min.css')}}">

      @yield('style')
    <style>
        /* Center the loader */
        #circle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 150px;
        height: 150px;
        }

        .loader {
        width: calc(100% - 0px);
        height: calc(100% - 0px);
        border: 3px solid #022f44;
        border-top: 3px solid rgb(0, 252, 252);
        border-radius: 50%;
        animation: rotate 8s linear infinite;
        }

        @keyframes rotate {
        100% {transform: rotate(360deg);}
        }

        }
        /* Add animation to "page content" */
    </style>

    <style>
        /* width */
        ::-webkit-scrollbar {
        width: 8px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: rgb(155, 150, 150);
        border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: rgb(105, 103, 103);
        }

    </style>
</head>
<body onload="loaderFunction()">
    <!--Loader-->
    <div id="circle"  style="margin: 0;">
        <div class="loader" id="loader">
            <div class="loader" id="loader">
                <div class="loader" id="loader">
                    <div class="loader" id="loader"></div>
                </div>
            </div>
        </div>
    </div>
    <!--End Loader-->
    <div class="wrapper wrapper-full-page" >
        @include('layouts.navs.guestnav')
        <div class="full-page login-page register-page" filter-color="black" data-image="{{asset('images/welcome.jpg')}}">
            <div class="content">
                <div class="container">
                    @yield('autentification')
                    @yield('content')
                </div>
            </div>
            @include('layouts.footer.footer')
        </div>
    </div>
    <script>
        var myTimer ;
        function loaderFunction(){
            myTimer = setTimeout(showPage,1000);
        }
        function showPage () {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
        }

    </script>
</body>
<!--   Core JS Files   -->
<script src="{{asset('assets/js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<!--  Plugin for the Wizard -->
<script src="{{asset('assets/js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{asset('assets/js/bootstrap-datetimepicker.js')}}"></script>
<!-- Vector Map plugin -->
<script src="{{asset('assets/js/jquery-jvectormap.js')}}"></script>
<!-- Sliders Plugin -->
<script src="{{asset('assets/js/nouislider.min.js')}}"></script>
<!-- Select Plugin -->
<script src="{{asset('assets/js/jquery.select-bootstrap.js')}}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{asset('assets/js/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{asset('assets/js/sweetalert2.js')}}"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('assets/js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{asset('assets/js/fullcalendar.min.js')}}"></script>
<!-- TagsInput Plugin -->
<script src="{{asset('assets/js/jquery.tagsinput.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('assets/js/material-dashboard.js')}}"></script>
<script src="{{asset('assets/js/demo.js')}}"></script>

@yield('scripts')
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>
