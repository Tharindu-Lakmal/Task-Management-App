<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('app.png') }}" type="image/png">

    <title>@yield("title", "OrganizedIt - Task Management App")</title>

    <link href="{{asset("build\assets\css\bootstrap.css")}}" rel="stylesheet">
    @yield("style")

    <style>
      .no-focus:focus {
        outline: none;
        box-shadow: none; 
        border-color: initial; 
      }

      input:focus, textarea:focus, select:focus {
        outline: none;
        box-shadow: none;
        border-color: initial;
      }
    </style>

  </head>
  <body class="d-flex flex-column h-100">

    @include('include.header')

    <div class="container">
        @yield("content")
    </div>

    @include('include.footer')


    <script src="{{asset("build\assets\js\bootstrap.js")}}"></script>
  </body>
</html>