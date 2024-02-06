<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wallet Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="menu-area">
        @include('partial.navbar')

        @if (session('FlsMsg'))
            <div class="alert alert-success">
                {{ session('FlsMsg') }}
            </div>
        @endif
    </div>
    <div class="content-area">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
        </div>
    </div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Footer</h2>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad consectetur consequatur delectus earum enim fuga illo illum labore nulla, odit qui quod rerum sapiente tempora vero vitae voluptate voluptatem.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .nav-link{ color: #fff !important; }
        .navbar-brand{ color: #fff !important; }
    </style>
  </body>
</html>
