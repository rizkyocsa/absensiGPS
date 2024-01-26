@extends('layout.master')

@section('header')
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">E - Presensi</div>
    <div class="right"></div>
</div>

<style>
    .webcam-capture,
    .webcam-capture video{
        display : inline-block;
        width : 100% !important;
        height : auto !important;
        margin : auto;
        border-radius : 15px;
    }

    #map { height: 180px; }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endsection

@section('content')
<div class="row" style="margin-top: 70px">
    <div class="col">
        <hidden type="text" id="lokasi">
        <div class="webcam-capture"></div>
    </div>
</div>
<div class="row">
    <div class="col">
        @if($check > 0)
        <button class="btn btn-danger btn-block" id="takeabsen">
            <ion-icon name="camera-outline"></ion-icon>Absen Pulang
        </button>
        @else
        <button class="btn btn-primary btn-block" id="takeabsen">
            <ion-icon name="camera-outline"></ion-icon>Absen Masuk
        </button>
        @endif
    </div>
</div>
<div class="row">
    <div class="col">
        <div id="map"></div>
    </div>
</div>

<audio src="{{ asset('assets/sound/Notifikasi_In.mp3')}}" id="notifikasi_in" type="audio/mpeg"></audio>
<audio src="{{ asset('assets/sound/Notifikasi_Out.mp3')}}" id="notifikasi_out" type="audio/mpeg"></audio>
<audio src="{{ asset('assets/sound/Notifikasi_Jarak.mp3')}}" id="notifikasi_jarak" type="audio/mpeg"></audio>
@endsection

@push('myscript')
<script>
    var notifikasi_in = document.getElementById('notifikasi_in');
    var notifikasi_out = document.getElementById('notifikasi_out');
    var notifikasi_jarak = document.getElementById('notifikasi_jarak');

    Webcam.set({
        height: 480,
        widht: 640,
        image_format: 'jpeg',
        jpeg_quality: 80
    });

    Webcam.attach('.webcam-capture')

    var lokasi = document.getElementById('lokasi');
    // lokasi = -6.815744,107.1382528;
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    }

    function successCallback(position){
        lokasi.value = position.coords.latitude+","+position.coords.longitude;
        var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 18);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        // $latitudkantor = -6.8078584;
        // $longitudekantor = 107.1465425;
        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
        // var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
        var circle = L.circle([-6.8056215,107.1406604], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.3,
            radius: 2500
        }).addTo(map);  
    }

    function errorCallback(){
        
    }

    $('#takeabsen').click(function(e){
        Webcam.snap(function(uri){
            image = uri;
        });
        var lokasi = $("#lokasi").val();
        $.ajax({
            type:'POST',
            url:'/presensi/store',
            data:{
                _token:"{{ csrf_token() }}",
                image: image,
                lokasi: lokasi,
            },
            cache: false,
            success: function(respond){
                var status = respond.split("|");
                if(status[0] == "success"){
                    if(status[2] == "in"){
                        notifikasi_in.play();
                    }else{
                        notifikasi_out.play();
                    }
                    Swal.fire({
                        title: 'Berhasil!',
                        text: status[1],
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    setTimeout("location.href='/dashboard'", 3000);
                }else{
                    if(status[2] == "radius"){
                        notifikasi_jarak.play();
                    }
                    Swal.fire({
                        title: 'Error !',
                        text: status[1],
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                    // setTimeOut("location:href+'/dashboard'", 3000);
                }
            }
        });
    });
</script>

@endpush