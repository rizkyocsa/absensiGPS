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
        font-size: 10px;
      }

      .table-presensi tr td{
        border: 1px solid #000;
        padding: 8px;
        font-size: 10px;
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
<body class="A4 landscape">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

  <table style="width: 100%" >
    <tr>
        <td style="width: 30px">
            <img src="{{ asset('assets/img/ff.png')}}" width="70" height="70" alt="">
        </td>
        <td>
            <span id="title">
                REKAP PRESENSI KARYAWAN <br>
                PERIODE {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }} <br>
                PT Kerja Praktek <br>
            </span>
            <span style="line-height: 3px;"><i>Jln. Kerja Prakterk No. 10, Kecamatan Cianjur, Kabupaten Cianjur</i></span>
        </td>
    </tr>
  </table>

  <table class="table-presensi">
      <tr>
        <th rowspan="2" >Nik</th>
        <th rowspan="2" >Nama lengkap</th>
        <th colspan="31" >Tanggal</th>
        <th rowspan="2" >Total Kerhadiran</th>
        <th rowspan="2" >Total Terlambat</th>
      </tr>
      <tr>
        <?php
            for($i=1; $i<=31; $i++){
                
        ?>
        <th>{{ $i }}</th>
        <?php
            }
        ?>
      </tr>
      @foreach($rekap as $data)
        <tr>
            <td>{{ $data->nik }}</td>
            <td>{{ $data->nama_lengkap }}</td>
            <?php
            $totalhadir = 0;
            $totallambat = 0;
            for($i=1; $i<=31; $i++){
                $tgl = "tgl_".$i;

                if(empty($data->$tgl)){
                    $hadir = ['',''];
                    $totalhadir += 0;
                }else{
                    $hadir = explode("-",$data->$tgl);
                    $totalhadir += 1;
                    if($hadir[0] > "07:00:00"){
                        $totallambat += 1;
                    }
                }
            ?>
            <td>
                <span style="color: {{ $hadir[0]> "07:00:00" ? "red" : "" }}" >{{ $hadir[0]  }}</span> <br>
                <span style="color: {{ $hadir[1]< "16:00:00" ? "red" : "" }}" >{{ $hadir[1] }}</span> <br>
            </td>
            
            <?php
                }
            ?>
            <td>{{ $totalhadir }}</td>
            <td>{{ $totallambat }}</td>
        </tr>
      @endforeach
  </table>

  <table class="table-signature">
    <tr>
        <td rowspan="6"></td>
        <td colspan="4">HRD</td>
        <!-- <td>A</td>
        <td>A</td>
        <td>A</td> -->
        <td rowspan="6"></td>
        <td rowspan="6"></td>
        <td colspan="4">PIMPINAN</td>
        <!-- <td>A</td>
        <td>A</td>
        <td>A</td> -->
        <td rowspan="6"></td>
    </tr>
    <tr>
        <td colspan="4" rowspan="3" >A</td>
        <td colspan="4" rowspan="3" >A</td>
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
        <td colspan="4">Nama HRD</td>
        <td colspan="4">Nama Pimpinan</td>
    </tr>
    <tr>
        <td colspan="4" >NIK.</td>
        <td colspan="4" >NIK.</td>
    </tr>
    
  </table>

    <!-- Write HTML just like a web page
    <article>This is an A4 document.</article> -->

  </section>

</body>

</html>