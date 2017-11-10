<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('/admin') }}/css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
</head>
<body class="sidebar-mini fixed">
<div class="wrapper">
    <!-- Navbar-->
    @include('admin.includes.navbar')
    <!-- End Navbar-->

    <!-- Side-Nav-->
    @include('admin.includes.sidebar')
    <!-- Side-Nav-->

   <div class="content-wrapper">
       @yield('body')
   </div>

</div>
<!-- Javascripts-->

    <script src="{{ asset('/admin') }}/js/jquery-2.1.4.min.js"></script>
    <script src="{{ asset('/admin') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('/admin') }}/js/plugins/pace.min.js"></script>
    <script src="{{ asset('/admin') }}/js/main.js"></script>


</body>
</html>