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
        @php $i=1 @endphp
        @foreach($barangList as $barang)
            <tr scope="row">
                <td align="center" class="bor">{{ $i++ }}</td>
                <td align="center" class="bor">{{$barang->nama_barang}}</td>
                <td align="center" class="bor">{{$barang->spesifikasi}}</td>
                <td align="center" class="bor">{{$barang->lokasi}}</td>
                <td align="center" class="bor">{{$barang->kondisi}}</td>
                <td align="center" class="bor">{{$barang->sumber_dana}}</td>
                <td align="center" class="bor">{{$barang->jml_masuk}}</td>
                <td align="center" class="bor">{{$barang->jml_keluar}}</td>
                <td align="center" class="bor">{{$barang->jml_pinjam}}</td>
                <td align="center" class="bor">{{$barang->total_barang}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <label>Total Data : {{count($barangList)}}</label>
@endsection