<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Online Result Management System</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}" >
    @yield('style')
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @include('parts.navigation')
        @yield('content')
    <footer style="background-color: #fff;padding:20px 0px;border-top: 1px solid #eee ; margin-top: 10px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; {{ date('Y') }} All Right Reserved, <a href="https://www.facebook.com/mehedimi">Mehedi Hasan</a></p>
                </div>
                <div class="col-md-6 text-right">
                    <p>This Project Created by Mehedi hasan</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ url('/js/jquery.min.js') }}"></script>
    <script src="{{ url('/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var currentLocation = location.href.split('?');
            jQuery('.nav a').each(function(i, v){
                if ($(v).attr("href") == currentLocation[0]) {
                    $(v).parents('li').addClass('active');
                    return false;
                }

            });
        });
    </script>
</body>
</html>