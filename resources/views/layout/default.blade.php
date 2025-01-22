<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("title", "Task Management App")</title>

    <link href="{{assets("public\build\assets\css\bootstrap.css")}}" rel="stylesheet">
    @yield("style")

  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">

    <div>
        @yield("content")
    </div>


    <script src="{{assets("public\build\assets\js\bootstrap.js")}}"></script>
  </body>
</html>