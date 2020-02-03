@extends('master.reportMaster')

@section('title','Laporan Peminjaman Barang')

@section('action-title','Data Peminjaman Barang')

@section('isi')
    <table border="1">
        <thead>
        <tr align="center">
            <th>No</th>
            <th>Tanggal Pinjam</th>
            <th>Nama Barang</th>
            <th>Nama Peminjam</th>
            <th>Jumlah Pinjam</th>
            <th>Batas Kembali</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Keterangan</th>
        </tr>
        </thead>
        <tbody>
        @php $i=1 @endphp
            @foreach($peminjamanBarangList as $peminjamanBarang)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{Date('d-m-Y',strtotime($peminjamanBarang->tgl_pinjam))}}</td>
                    <td>{{$peminjamanBarang->nama_barang}}</td>
                    <td>{{$peminjamanBarang->fullname}}</td>
                    <td>{{$peminjamanBarang->jml_barang}}</td>
                    <td>{{Date('d-m-Y',strtotime($peminjamanBarang->batas_kembali))}}</td>

                    @if($peminjamanBarang->tgl_kembali == '00000000')
                        <td>--NONE--</td>
                    @else
                        <td>{{Date('d-m-Y',strtotime($peminjamanBarang->tgl_kembali))}}</td>
                    @endif

                    @if($peminjamanBarang->kondisi == 'N')
                        <td ><label>Belum Kembali</label></td>
                    @else
                        <td ><label>Sudah Kembali</label></td>
                    @endif

                    @if($peminjamanBarang->status_kembali == -1)
                        <td>--NONE--</td>
                    @elseif(Date('Y-m-d',strtotime($peminjamanBarang->tgl_kembali)) == Date('Y-m-d',strtotime($peminjamanBarang->batas_kembali)))
                        <td>Tepat Waktu</td>
                    @elseif(Date('Y-m-d',strtotime($peminjamanBarang->batas_kembali)) > Date('Y-m-d',strtotime($peminjamanBarang->tgl_kembali)))
                        <td>Lebih Cepat {{$peminjamanBarang->status_kembali}} Hari</td>
                    @elseif(Date('Y-m-d',strtotime($peminjamanBarang->batas_kembali)) < Date('Y-m-d',strtotime($peminjamanBarang->tgl_kembali)))
                        <td>Terlambat {{$peminjamanBarang->status_kembali}} Hari</td>
                    @endif
                </tr>
                @endforeach
            <tr>
                <td colspan="6" style="font-weight: bold;">TOTAL DATA</td>
                <td class="total" colspan="3">{{count($peminjamanBarangList)}}</td>
            </tr>
        </tbody>
    </table>
@endsection