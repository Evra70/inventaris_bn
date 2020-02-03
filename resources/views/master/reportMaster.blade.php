<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Inventaris - @yield('title')</title>
    <link rel="stylesheet" href="{{public_path('/asset_report/style.css')}}" media="all" />

</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="{{public_path('/asset_report/logo.png')}}">
    </div>
    <h1>Laporan @yield('action-title')</h1>
    <div id="company" class="clearfix">
        <div>Smk Bagimu Negeriku</div>
        <div>Jl. Palir Raya No. 66 – 68,</div>
        <div>Kec. Ngaliyan, Podorejo,</div>
        <div>Jawa Tengah 50187, Indonesia</div>
        <div>0294-367 0495</div>
        <div>sekolah@smkbagimunegeriku.sch.id</div>
    </div>
    <div id="project" style="margin-left: -25%;">
        <div>Nama Manager : {{Auth::user()->fullname}}</div>
        <div>Tanggal Cetak : {{Date('d-m-Y')}}</div>
    </div>
</header>
<main>
    @yield('isi')
</main>
<footer>
    Invoice was created on a computer and is valid without the signature and seal.
</footer>
</body>
</html>