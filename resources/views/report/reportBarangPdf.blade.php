@extends('master.reportMaster')

@section('title','Laporan Barang')

@section('action-title','Data Barang')

@section('isi')
    <table class='table table-bordered' style="border-collapse: collapse;">
        <thead>
        <tr align="center">
            <th scope="col" class="bor">No</th>
            <th scope="col" class="bor">Nama Barang</th>
            <th scope="col" class="bor">Spesifikasi</th>
            <th scope="col" class="bor">Lokasi</th>
            <th scope="col" class="bor">Kondisi</th>
            <th scope="col" class="bor">Sumber Dana</th>
            <th scope="col" class="bor">Total Masuk</th>
            <th scope="col" class="bor">Total Keluar</th>
            <th scope="col" class="bor">Total Pinjam</th>
            <th scope="col" class="bor">Total Barang</th>
        </tr>
        </thead>
        <tbody>
        @php $i=1; @endphp
        @foreach($barangList as $barang)
            <tr scope="row">
                <th align="center" class="bor">{{ $i++ }}</th>
                <th align="center" class="bor">{{$barang->nama_barang}}</th>
                <th align="center" class="bor">{{$barang->spesifikasi}}</th>
                <th align="center" class="bor">{{$barang->lokasi}}</th>
                <th align="center" class="bor">{{$barang->kondisi}}</th>
                <th align="center" class="bor">{{$barang->sumber_dana}}</th>
                <th align="center" class="bor">{{$barang->jml_masuk}}</th>
                <th align="center" class="bor">{{$barang->jml_keluar}}</th>
                <th align="center" class="bor">{{$barang->jml_pinjam}}</th>
                <th align="center" class="bor">{{$barang->total_barang}}</th>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th  align="center" class="bor" colspan="8">Total Data</th>
                <th  align="center" class="bor" colspan="2">{{count($barangList)}}</th>
            </tr>
        </tfoot>
    </table>


@endsection