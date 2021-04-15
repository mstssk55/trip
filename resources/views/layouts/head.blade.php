@section('head')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
   
    <!--bootstrapテーマ-->
    <!-- Web Fonts -->
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,700%7COpen+Sans:300,400,700" rel="stylesheet">
    
    <!-- Bootstrap Styles -->
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}">

    <!-- Components Vendor Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/font-awesome/css/fontawesome-all.min.css')}}">

    <!-- Theme Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">
</head>

@endsection