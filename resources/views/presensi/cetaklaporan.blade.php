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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
      @page { size: A4 }
      #title{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18px;
        font-weight: bold;
      }

      .table-karyawan{
        margin-top: 40px;
      }

      .table-karyawan td{
        padding: 5px;
      }

      .table-presensi{
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        
      }

      .table-presensi tr th{
        border: 1px solid #000;
        padding: 8px;
        background: #dbdbdb;
      }

      .table-presensi tr td{
        border: 1px solid #000;
        padding: 8px;
      }

      .table-signature{
        width: 100%;
        border: 1px solid #000;
        margin-top: 20px
      }

      .table-signature tr td{
        /* border: 1px solid #000; */
        padding: 8px;
      }

      .table-signature td {
        text-align: center;
        vertical-align: middle;
        }
      .avatar{
        width: 50px;
        height: 50px;
      }


  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

  <table style="width: 100%" >
    <tr>
        <td style="width: 30px">
            <img src="{{ asset('assets/img/logo-sd.png')}}" width="70" height="70" alt="">
        </td>
        <td>
            <span id="title">
                LAPORAN PRESENSI GURU SDN SINDANGRERET <br>
                PERIODE {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }} <br>
            </span>
            <span style="line-height: 3px;"><i>Jln Jati Kp. SINDANGRERET, Kecamatan Cianjur, Kabupaten Cianjur</i></span>
        </td>
    </tr>
  </table>

  <table class="table-karyawan">
    <tr>
        <td rowspan="6"> 
            @php 
                $path = Storage::url('upload/karyawan/'.$karyawan->foto);
            @endphp
            <img src="{{ url($path) }}" width="200" height="250" alt="">
        </td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td>{{ $karyawan->nik }}</td>
    </tr>
    <tr>
        <td>Nama Karyawan</td>
        <td>:</td>
        <td>{{ $karyawan->nama_lengkap }}</td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $karyawan->jabatan }}</td>
    </tr>
    <tr>
        <td>Departemen</td>
        <td>:</td>
        <td>{{ $karyawan->nama_dept }}</td>
    </tr>
    <tr>
        <td>No HP</td>
        <td>:</td>
        <td>{{ $karyawan->no_hp }}</td>
    </tr>
  </table>
    
  <table class="table-presensi">
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>NIK</th>
        <th>Jam Masuk</th>
        <th>Foto</th>
        <th>Jam Pulang</th>
        <th>Foto</th>
        <th>Keterangan</th>
        <th>Jam Kerja</th>
      </tr>
        @foreach($presensi as $data)
        @php 
            $foto_in = Storage::url('uploads/absensi/'.$data->foto_in);
            $foto_out = Storage::url('uploads/absensi/'.$data->foto_out);
        @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ date("d-m-y",strtotime($data->tgl_presensi))}}</td>
                <td>{{ $data->nik }}</td>
                <td>{{ $data->jam_in }}</td>
                <td>
                    <img src="{{ url($foto_in )}}" class="avatar" alt="">
                </td>
                <td>{{ $data->jam_out }}</td>
                <td><img src="{{ url($foto_out )}}" class="avatar" alt=""></td>
                <td>
                @if( $data->jam_in >= '07:00')
                    @php 
                    $jamterlambat = selisih('07:00:00', $data->jam_in)
                    @endphp
                    <!-- <span class="badge bg-danger">Terlambat {{ $jamterlambat }}</span> -->
                    <p>Terlambat {{ $jamterlambat }}</p>
                @else
                    <!-- <span class="badge bg-success">Tepas Waktu</span> -->
                    <p>Tepat Waktu </p>
                @endif
                </td>
                <td>
                @php 
                    $jumlahjam = selisih($data->jam_in, $data->jam_out)
                    @endphp
                    <p>{{ $jumlahjam }} </p>
                </td>
            </tr>
        @endforeach
  </table>

  <table class="table-signature" style="border: 0px;">
    <tr>
        <td rowspan="6"></td>
        <td colspan="4">Staff</td>
        <!-- <td>A</td>
        <td>A</td>
        <td>A</td> -->
        
        <td rowspan="6"></td>
        <td colspan="4">Kepala Sekolah</td>
        <!-- <td>A</td>
        <td>A</td>
        <td>A</td> -->
        <td rowspan="6"></td>
    </tr>
    <tr>
        <td colspan="4" rowspan="3" >&nbsp;</td>
        <td colspan="4" rowspan="3" >&nbsp;</td>
        <!-- <td>A</td>
        <td>A</td>
        <td>A</td>
        <td>A</td> -->
    </tr>
    <tr>
        <!-- <td colspan="4" rowspan="3" ></td>
        <td colspan="4" rowspan="3" ></td> -->
        <!-- <td>A</td>
        <td>A</td>
        <td>A</td>
        <td>A</td> -->
        <!-- <td>A</td>
        <td>A</td>
        <td>A</td>
        <td>A</td> -->
    </tr>
    <tr>
        <!-- <td>A</td>
        <td>A</td>
        <td>A</td>
        <td>A</td> -->
        <!-- <td>A</td>
        <td>A</td>
        <td>A</td>
        <td>A</td> -->
    </tr>
    <tr>
      <td colspan="4">Fitriani, S.Pd</td>
      <td colspan="4">Oon Hasanah, S.Pd</td>
    </tr>
    <tr>
      <td colspan="4" >NIP. 1964082419880320007</td>
      <td colspan="4" >NIP. 1964095419870320009</td>
    </tr>
    
  </table>

    <!-- Write HTML just like a web page
    <article>This is an A4 document.</article> -->

  </section>

</body>

</html>