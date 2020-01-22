@extends('master.reportMaster')

@section('title','Laporan Barang Masuk')

@section('action-title','Data Barang Masuk')

@section('isi')
    <table class='table table-bordered' style="border-collapse: collapse;" width="100%">
        <thead>
        <tr align="center">
            <th scope="col" class="bor">No</th>
            <th scope="col" class="bor">Nama Barang</th>
            <th scope="col" class="bor">Tanggal Masuk</th>
            <th scope="col" class="bor">Jumlah Masuk</th>
            <th scope="col" class="bor">Nama Suplier</th>
        </tr>
        </thead>
        <tbody>
        @php $i=1 @endphp
        @foreach($barangMasukList as $barangMasuk)
            <tr scope="row" >
                <td align="center" class="bor">{{ $i++ }}</td>
                <td align="center" class="bor">{{$barangMasuk->nama_barang}}</td>
                <td align="center" class="bor">{{Date('d-m-Y',strtotime($barangMasuk->tgl_masuk))}}</td>
                <td align="center" class="bor">{{$barangMasuk->jml_masuk}}</td>
                <td align="center" class="bor">{{$barangMasuk->nama_suplier}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th  align="center" class="bor" colspan="3">Total Data</th>
            <th  align="center" class="bor" colspan="2">{{count($barangMasukList)}}</th>
        </tr>
        </tfoot>
    </table>
@endsection