<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="SurabayaDev Website">
  <meta name="author" content="SurabayaDev Team">

  <title>{{ str_finish(@$title ?: 'Page', ' - ') }} {{ config('app.name') }}</title>

  <!-- Custom fonts for this template-->
  {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" rel="stylesheet" type="text/css"> --}}
  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}

  <!-- Custom styles for this template-->
  {{-- <link href="{{ admin_asset('css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}
  <link href="{{ admin_asset('css/admin.css') }}" rel="stylesheet">

  @yield('head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin::partials.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('admin::partials.navbar')
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @include('admin::partials.alert')

                    @yield('content')
                </div>

                <footer class="sticky-footer bg-white mt-5">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>&COPY; Copyright - SurabayaDev 2015</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ admin_asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/link-sangar.js') }}"></script> --}}
    <script src="{{ admin_asset('js/admin.js') }}"></script>
    <script>
        $('body *[data-toggle=tooltip]').tooltip({ boundary: 'window' })
    </script>

    @yield('foot')
</body>
</html>