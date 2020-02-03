@extends('master.reportMaster')

@section('title','Laporan Berita Acara Barang Keluar')

@section('action-title','Berita Acara Barang Keluar')

@section('isi')
    <table border="1">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Tanggal Keluar</th>
            <th>Jumlah Keluar</th>
            <th>Lokasi</th>
            <th>Penerima</th>
        </tr>
        </thead>
        <tbody>
        @php $i=1 @endphp
        @foreach($barangKeluarList as $barangKeluar)
            <tr>
                <th class="c">{{$i++}}</th>
                <td class="r">{{$barangKeluar->nama_barang}}</td>
                <td class="c">{{Date('d-m-Y',strtotime($barangKeluar->tgl_keluar))}}</td>
                <td class="c">{{$barangKeluar->jml_keluar}}</td>
                <td class="r">{{$barangKeluar->lokasi}}</td>
                <td class="r">{{$barangKeluar->penerima}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" style="font-weight: bold;">TOTAL DATA</td>
            <td class="total" colspan="2">{{count($barangKeluarList)}}</td>
        </tr>
        </tbody>
    </table>
   <!--  <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
    </div> -->
@endsection
