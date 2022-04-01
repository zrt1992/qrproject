<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" background="black" sizes="16x16" href="{{asset('admin-assets/images/logo_black.png')}}">
    <title>Stackin'AR</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('admin-assets/assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('admin-assets/assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Morris CSS -->
    <link href="{{asset('admin-assets/assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('admin-assets/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/assets/node_modules/datatables/media/css/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <link href="{{asset('admin-assets/assets/icons/font-awesome/css/fontawesome-all.css')}}" rel="stylesheet">

    <link href="{{asset('admin-assets/css/pages/chat-app-page.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

    <link href="{{asset('admin-assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/css/sweet-alert.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    @yield('header_css_links')

</head>
