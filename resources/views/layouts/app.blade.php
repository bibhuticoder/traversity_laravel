<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
    
</head>
<body>
    <div id="app">
       @include('inc.navbar')
       <br>
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
        @include('inc.chat')
        @include('inc.footer')
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
   
    <script src="{{ asset('js/chat.js') }}"></script>  
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>  
   
     <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>  
      <script>
        CKEDITOR.replace('article-ckeditor'); 
    </script>
   
</body>
</html>
