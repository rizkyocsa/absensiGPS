<?php
    function selisih($jam_masuk, $jam_keluar)
    {
        list($h, $m, $s) = explode(":", $jam_masuk);
        $dtAwal = mktime($h, $m, $s, "1", "1", "1");
        list($h, $m, $s) = explode(":", $jam_keluar);
        $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
        $dtSelisih = $dtAkhir - $dtAwal;
        $totalmenit = $dtSelisih / 60;
        $jam = explode(".", $totalmenit / 60);
        $sisamenit = ($totalmenit / 60) - $jam[0];
        $sisamenit2 = $sisamenit * 60;
        $jml_jam = $jam[0];
        return $jml_jam . ":" . round($sisamenit2);
    }
?>

@foreach($presensi as $data)
@php 
    $foto_in = Storage::url('uploads/absensi/'.$data->foto_in);
    $foto_out = Storage::url('uploads/absensi/'.$data->foto_out);
@endphp
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->nik }}</td>
        <td>{{ $data->nama_lengkap }}</td>
        <td>{{ $data->nama_dept }}</td>
        <td>{{ $data->jam_in }}</td>
        <td>
            <img src="{{ url($foto_in )}}" class="avatar" alt="">
        </td>
        <td>{!! $data->jam_out != null ? $data->jam_out : '<span class="badge bg-danger">Belum Absen</span>' !!}</td>
        <td>
            @if( $data->foto_out != null)
                <img src="{{ url($foto_in )}}" class="avatar" alt="">
            
            @endif
        </td>
        <td>
            @if( $data->jam_in >= '07:00')
            @php 
               $jamterlambat = selisih('07:00:00', $data->jam_in)
            @endphp
                <span class="badge bg-danger">Terlambat {{ $jamterlambat }}</span>
            @else
                <span class="badge bg-success">Tepas Waktu</span>
            @endif
        </td>
    </tr>
@endforeach