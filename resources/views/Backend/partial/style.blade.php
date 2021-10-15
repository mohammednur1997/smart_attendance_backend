<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        @yield('title', 'AzmiSoft')
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <link rel="icon" href={{"image/logos/".app_config('AppFav')}} type="image/gif" sizes="16x16">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href={{asset("assets/js/bootstrap/css/bootstrap.min.css")}}>
    <link type="text/css" rel="stylesheet" href={{asset("assets/css/jquery-ui-custom.css")}}>


    <link type="text/css" rel="stylesheet" href={{asset("assets/css/font-awesome.min.css")}}>
    <link type="text/css" rel="stylesheet" href={{asset("assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css")}}>
    <link type="text/css" rel="stylesheet" href={{asset("assets/vendors/iCheck/skins/all.css")}}>

    <link type="text/css" rel="stylesheet" href={{asset("assets/js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css")}}>
    <link type="text/css" rel="stylesheet" href={{asset("assets/js/bootstrap-datepicker/css/datepicker.css")}}>
    <link type="text/css" rel="stylesheet" href={{asset("assets/js/bootstrap-timepicker/css/bootstrap-timepicker.min.css")}}>


    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
    <!--LOADING STYLESHEET FOR PAGE-->


    <link type="text/css" rel="stylesheet" href={{asset("assets/css/sco.message.css")}}>
    <link type="text/css" rel="stylesheet" href={{asset("assets/css/introjs.css")}}>
    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href={{asset("assets/css/animate.css")}}>
    <link type="text/css" rel="stylesheet" href={{asset("assets/css/pace.css")}}>
   {{-- <link type="text/css" rel="stylesheet" href={{asset("assets/css/all.css")}}>--}}
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href={{asset("assets/css/themes/style1/orange-blue.css")}} class="default-style">
    <link type="text/css" rel="stylesheet" href={{asset("assets/css/themes/style1/orange-blue.css")}} id="theme-change"
          class="style-change color-change">
    <link type="text/css" rel="stylesheet" href={{asset("assets/css/style-responsive.css")}}>
    <link type="text/css" rel="stylesheet" href={{asset("assets/css/jquery.dataTables.min.css")}}>
    <link type="text/css" rel="stylesheet" href={{asset("assets/css/daterangepicker.css")}}>

    <!--Toaster style-->
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css')}}">
</head>
<body class=" ">
