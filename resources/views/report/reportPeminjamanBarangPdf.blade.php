@extends('master.reportMaster')

@section('title','Laporan Peminjaman Barang')

@section('action-title','Data Peminjaman Barang')

@section('isi')
    <table class='table table-bordered' style="border-collapse: collapse;" width="100%">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Peminjam</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Jumlah Pinjam</th>
            <th scope="col">Tanggal Kembali</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @php $i=1 @endphp
            @foreach($peminjamanBarangList as $peminjamanBarang)
                <tr>
                    <th align="center" class="bor">{{$i++}}</th>
                    <td align="center" class="bor">{{$peminjamanBarang->fullname}}</td>
                    <td align="center" class="bor">{{$peminjamanBarang->nama_barang}}</td>
                    <td align="center" class="bor">{{Date('d-m-Y',strtotime($peminjamanBarang->tgl_pinjam))}}</td>
                    <td align="center" class="bor">{{$peminjamanBarang->jml_barang}}</td>
                    <td align="center" class="bor">{{Date('d-m-Y',strtotime($peminjamanBarang->tgl_kembali))}}</td>
                    @if($peminjamanBarang->kondisi == 'N')
                        <td align="center" class="bor">Belum Kembali</td>
                    @else
                        <td align="center" class="bor">Sudah Kembali</td>
                @endif
        @endforeach
        </tbody>
    </table>
    <label>Total Barang : {{count($peminjamanBarangList)}}</label>
@endsection