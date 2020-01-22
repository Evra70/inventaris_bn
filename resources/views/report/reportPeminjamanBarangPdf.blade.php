@extends('master.reportMaster')

@section('title','Laporan Peminjaman Barang')

@section('action-title','Data Peminjaman Barang')

@section('isi')
    <table class='table table-bordered' style="border-collapse: collapse;" width="100%">
        <thead>
        <tr align="center">
            <th scope="col" class="bor">No</th>
            <th scope="col" class="bor">Nama Peminjam</th>
            <th scope="col" class="bor">Nama Barang</th>
            <th scope="col" class="bor">Tanggal Pinjam</th>
            <th scope="col" class="bor">Jumlah Pinjam</th>
            <th scope="col" class="bor">Tanggal Kembali</th>
            <th scope="col" class="bor">Status</th>
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
        <tfoot>
        <tr>
            <th  align="center" class="bor" colspan="5">Total Data</th>
            <th  align="center" class="bor" colspan="2">{{count($peminjamanBarangList)}}</th>
        </tr>
        </tfoot>
    </table>
@endsection