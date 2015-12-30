<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>

        <link type="text/css" rel="stylesheet" href="{{asset('style/bootstrap.min.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('style/leftPanel.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('style/dashboard.css')}}">
        <script src="{{asset('js/jquery/jquery.1.11.3.min.js')}}"></script>
        <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>

        <script src="{{asset('js/dashboard.js')}}"></script>

    </head>
    <body>
      <div class="container-fluid">
        @include('dashboard.leftPanel')
        <div class="row">
          <div class="col-xs-9 col-xs-offset-3" id="panel">
            <!-- -->
          </div>
        </div>
      </div>
    </body>
</html>