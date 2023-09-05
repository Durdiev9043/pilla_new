<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>E-PILLA axborot tizimi</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="{{asset('/assets/img/icon.ico')}}" type="image/x-icon"/>

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script> --}}
    <script src="{{asset('/assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <!-- Fonts and icons -->
    <script src="{{asset('/assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families": ["Lato:300,400,700,900"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['{{asset("/assets/css/fonts.min.css")}}']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/atlantis.min.css')}}">
    <style>
        table.dataTable tfoot th {
            border-top: 1px solid  #111 !important;
        }
.paginate_button{
    background-color: #efefef;
    border: 1px solid #efefef;
    border-radius: 15px;
    color: black;
    text-decoration: none;
    margin: 5px;
    padding: 5px 15px;
}
        #mytable_filter input{
            border: 1px solid #000000  !important;
            border-radius: 20px;
            /*box-shadow: 3px 5px 12px rgba(0,0,0, 0.5);*/
        }

        td{
            padding: 0px 10px;
        }
        th{
            padding: 10px 5px !important;
        }
    </style>


</head>
<body>
<div class="wrapper">
    <div class="main-header">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue">
            @if(\Illuminate\Support\Facades\Auth::user()->role==0)
            <a href="{{route('admin.home')}}" class="logo">
                <p class="navbar-brand" style="color: white">E-PILLA.UZ  </p>
            </a>

            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
{{--            <div class="nav-toggle">--}}
{{--                <button class="btn btn-toggle toggle-sidebar">--}}
{{--                    <i class="icon-menu"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
            @else
                <a href="#" class="logo">
                    <p class="navbar-brand" style="color: white">{{Auth::user()->name}} tumani</p>
                </a>

                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
{{--                <div class="nav-toggle">--}}
{{--                    <button class="btn btn-toggle toggle-sidebar">--}}
{{--                        <i class="icon-menu"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
                @endif

        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
    @include('admin.nav')

    <!-- End Navbar -->
    </div>

    <!-- Sidebar -->

        @include('admin.sidebar')

<!-- End Sidebar -->

{{--    @if(\Illuminate\Support\Facades\Auth::user()->role==0)--}}
    <div class="main-panel">
        <div class="content">
                @yield('content')
        </div>
    </div>

</div>
<!--   Core JS Files   -->

<script src="{{asset('/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('/assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


<!-- Chart JS -->
<script src="{{asset('/assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('/assets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- jQuery Vector Maps -->
<script src="{{asset('/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('/assets/js/sweetalert2.all.min.js')}}"></script>

 <script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>`
{{-- <script type="text/javascript" language="javascript" charset="utf-8" src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" charset="utf-8" src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.23.0/moment.min.js"></script> --}}
{{-- <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"/> --}}
{{--<script type="text/javascript" language="javascript" src="//cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.js"></script>--}}
<!-- Atlantis JS -->
<script src="{{asset('/assets/js/atlantis.min.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

@yield('script')
</body>
</html>
