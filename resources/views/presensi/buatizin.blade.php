@extends('layout.master')

@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<style>
    .datepicker-modal {
        max-height: 430px !important;
    }

    .datepicker-date-display {
        background-color: #0f3a7e !important;
    }
</style>
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton Back">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Form Izin</div>
    <div class="right"></div>
</div>
@endsection

@section('content')
<!-- <div class="row" style="margin-top: 65px">
    <div class="col">
        @php
            $messagesuccess = Session::get('success');
            $messageerror = Session::get('error');
        @endphp
        
        @if(Session::get('success'))
            <div class="alert alert-success">
                {{ $messagesuccess }}
            </div>
        @endif
        @if(Session::get('error'))
            <div class="alert alert-warning">
                {{ $messageerror }}
            </div>
        @endif
    </div>
</div> -->
<div class="row" style="margin-top: 65px">
    <div class="col">
        <form action="/presensi/storeizin" method="POST" id="frmIzin">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control datepicker" name="tgl_izin" id="tgl_izin" placeholder="Tanggal">
            </div>
            <div class="form-group">
                <select class="form-control" name="status" id="status">
                    <option value="">Izin/Sakit</option>  
                    <option value="i">Izin</option>  
                    <option value="s">Sakit</option>  
                </select>
            </div>
            <div class="form-group">
                <textarea type="textarea" class="form-control " name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary w-100">Kirim</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('myscript')
<script>
    var currYear = (new Date()).getFullYear();

    $(document).ready(function() {
        $(".datepicker").datepicker({
            // defaultDate: new Date(currYear,1,31),
            // // setDefaultDate: new Date(2000,01,31),
            // maxDate: new Date(currYear,12,31),
            // yearRange: [2000, currYear],
            format: "yyyy-mm-dd"    
        });

        $("#tgl_izin").change(function(e){
            var tgl_izin = $(this).val();
            // alert(tgl_izin);
            $.ajax({
                type:'POST',
                url: '/presensi/cekizin',
                data: {
                    _token: "{{ csrf_token(); }}",
                    tgl_izin: tgl_izin
                },
                cache: false,
                success: function(respond){
                    if(respond == 1){
                        Swal.fire({
                            title: "Oops!",
                            text: 'Anda sudah melakukan pengajuan hari ini',
                            icon: 'warning'
                        }).then((result)=>{
                            $("#tgl_izin").val("");
                        });
                    }
                }
            });
        });

        $("#frmIzin").submit(function(){
            var tgl_izin = $("#tgl_izin").val();
            var status = $("#status").val();
            var keterangan = $("#keterangan").val();
            if(tgl_izin == ""){
                Swal.fire({
                        title: 'Oops !',
                        text: "Tannggal harus diisi",
                        icon: 'warning',
                    });
                return false;
            }else if(status == ""){
                Swal.fire({
                        title: 'Oops !',
                        text: "Status harus diisi",
                        icon: 'warning',
                    });
                return false;
            }else if(keterangan == ""){
                Swal.fire({
                        title: 'Oops !',
                        text: "Keterangan harus diisi",
                        icon: 'warning',
                    });
                return false;
            }
        });

    });
     
</script>
@endpush