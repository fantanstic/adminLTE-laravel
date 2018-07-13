<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@section('title', 'Admin')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('AdminLTE/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/Ionicons/css/ionicons.min.css') }}">
    @yield('style')
    <link rel="stylesheet" href="{{ asset('AdminLTE/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/skins/skin-blue.min.css') }}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layout.main-header')
        @include('layout.main-sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('layout.main-footer')
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/js/adminlte.min.js') }}"></script>
    <script type="application/javascript">
        function GetUrlRelativePath() {
            //获取url链接
            var url = document.location.toString();

            //去除http://
            var arrUrl = url.split("//");
            var relUrl = arrUrl[1].substring(arrUrl[1].indexOf("/"));//stop省略，截取从start开始到结尾的所有字符

            //去除参数
            if (relUrl.indexOf("?") != -1) {
                relUrl = relUrl.split("?")[0];
            }
            //获取版本号
            relUrl=(relUrl.substring(-1,relUrl.lastIndexOf("/")));
            relUrl=(relUrl.substring(relUrl.lastIndexOf("/")+1));
            return relUrl;
        }
        var app_type=GetUrlRelativePath();
        var obj = document.getElementsByName(app_type);
        obj[0].style.display='block';
    </script>
    @yield('script')
</body>