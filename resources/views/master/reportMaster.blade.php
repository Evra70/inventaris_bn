<!DOCTYPE html>
<html>
<head>
    <title>Inventaris - @yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
<style type="text/css">
    table tr td,
    table tr th{
        font-size: 9pt;
    }
    .bor{
        border: 1px solid black;

    }
</style>
<center>
    <h4>Laporan @yield('action-title')</h4>

</center>
<h5>
    <label>User : {{Auth::user()->fullname}}</label><br>
    <label>Tanggal : {{Date('d-m-Y')}}</label>
</h5>
@yield('isi')

</body>
</html>