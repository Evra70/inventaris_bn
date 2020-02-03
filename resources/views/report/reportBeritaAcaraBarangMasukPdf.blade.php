@extends('master.reportMaster')

@section('title','Laporan Berita Acara Barang Masuk')

@section('action-title','Berita Acara Barang Masuk')


@section('isi')
    <table border="1">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Tanggal Masuk</th>
            <th>Jumlah Masuk</th>
            <th>Nama Suplier</th>
        </tr>
        </thead>
        <tbody>
         @php $i=1 @endphp
        @foreach($barangMasukList as $barangMasuk)
            <tr scope="row" >
                <td class="c">{{ $i++ }}</td>
                <td class="r">{{$barangMasuk->nama_barang}}</td>
                <td class="c">{{Date('d-m-Y',strtotime($barangMasuk->tgl_masuk))}}</td>
                <td class="c">{{$barangMasuk->jml_masuk}}</td>
                <td class="r">{{$barangMasuk->nama_suplier}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" style="font-weight: bold;">TOTAL DATA</td>
            <td class="total" colspan="2">{{count($barangMasukList)}}</td>
        </tr>
        </tbody>
    </table>
   <!--  <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
    </div> -->
@endsection