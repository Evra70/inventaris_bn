@extends('master.reportMaster')

@section('title','Laporan Barang')

@section('action-title','Data Barang')

@section('isi')
    <table border="1">
        <thead>
        <tr>
            <th >NO</th>
            <th >NAMA BARANG</th>
            <th >SPESIFIKASI</th>
            <th >LOKASI</th>
            <th >KONDISI</th>
            <th >SUMBER DANA</th>
            <th >JUMLAH MASUK</th>
            <th >JUMLAH KELUAR</th>
            <th >JUMLAH PINJAM</th>
            <th >TOTAL BARANG</th>
        </tr>
        </thead>
        <tbody>
        @php $i=1; @endphp
        @foreach($barangList as $barang)
            <tr scope="row">
                <td class="c">{{ $i++ }}</td>
                <td class="r">{{$barang->nama_barang}}</td>
                <td class="r">{{$barang->spesifikasi}}</td>
                <td class="r">{{$barang->lokasi}}</td>
                <td class="r">{{$barang->kondisi}}</td>
                <td class="r">{{$barang->sumber_dana}}</td>
                <td class="c">{{$barang->jml_masuk}}</td>
                <td class="c">{{$barang->jml_keluar}}</td>
                <td class="c">{{$barang->jml_pinjam}}</td>
                <td class="c">{{$barang->total_barang}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" style="font-weight: bold;">TOTAL DATA</td>
            <td class="total" colspan="6">{{count($barangList)}}</td>
        </tr>
        </tbody>
    </table>
   <!--  <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
    </div> -->
@endsection