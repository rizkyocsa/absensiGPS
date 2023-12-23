@extends('layout.master')

@section('header')
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton Back">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Data Izin / Sakit</div>
    <div class="right"></div>
</div>
@endsection

@section('content')
<div class="row" style="margin-top: 65px">
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
</div>

<div class="row">
    <div class="col">
    @foreach($dataizin as $data)
    <ul class="listview image-listview">
        <li>
            <div class="item">
                <div class="in">
                    <div>
                        <b>{{date("d-m-Y",strtotime($data->tgl_izin))}} ({{$data->status == 's' ? 'Sakit' : 'Izin'}})</b><br>
                        <small class="text-muted">
                        {{$data->keterangan}}
                        </small>
                    </div>
                    @if($data->status_approved == 0)
                        <span class="badge bg-warning">Waiting</span>    
                    @elseif($data->status_approved == 1)
                        <span class="badge bg-success">Approved</span> 
                    @elseif($data->status_approved == 2)
                    <span class="badge bg-danger">Decline</span>  
                    @endif
                </div>
            </div>
        </li>
    </ul>
    @endforeach
    </div>
</div>
<div class="fab-button bottom-right" style="margin-bottom: 55px;">
    <a href="/presensi/buatizin" class="fab">
        <ion-icon name="add-outline"></ion-icon>
    </a>
</div>
@endsection

