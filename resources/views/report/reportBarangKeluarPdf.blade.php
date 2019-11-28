@extends('master.reportMaster')

@section('title','Laporan Barang Keluar')

@section('action-title','Data Barang Keluar')

@section('isi')
    <table class='table table-bordered' style="border-collapse: collapse;" width="100%">
        <thead>
        <tr align="center">
            <th scope="col" class="bor">No</th>
            <th scope="col" class="bor">Nama Barang</th>
            <th scope="col" class="bor">Tanggal Keluar</th>
            <th scope="col" class="bor">Jumlah Keluar</th>
            <th scope="col" class="bor">Lokasi</th>
            <th scope="col" class="bor">Penerima</th>
        </tr>
        </thead>
        <tbody>
        @php $i=1 @endphp
        @foreach($barangKeluarList as $barangKeluar)
            <tr>
                <th scope="row" class="bor">{{$i++}}</th>
                <td scope="row" class="bor">{{$barangKeluar->nama_barang}}</td>
                <td scope="row" class="bor">{{Date('d-m-Y',strtotime($barangKeluar->tgl_keluar))}}</td>
                <td scope="row" class="bor">{{$barangKeluar->jml_keluar}}</td>
                <td scope="row" class="bor">{{$barangKeluar->lokasi}}</td>
                <td scope="row" class="bor">{{$barangKeluar->penerima}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <label>Total Barang : {{count($barangKeluarList)}}</label>
@endsection