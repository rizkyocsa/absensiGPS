@extends('layout.master')

@section('content')
<div class="section" id="user-section">
        <div id="user-detail">
            @if(!empty(Auth::guard('karyawan')->user()->foto))
                @php
                    $path = Storage::url('public/upload/karyawan/'.Auth::guard('karyawan')->user()->foto);
                @endphp"
            <div class="avatar">
                <img src="{{ url($path) }}" alt="avatar" class="imaged w64" style="height: 50px;">
            </div>
            @endif
            <div id="user-info">
                <h2 id="user-name">{{ Auth::guard('karyawan')->user()->nama_lengkap }}</h2>
                <span id="user-role">{{ Auth::guard('karyawan')->user()->jabatan }}</span>
            </div>
        </div>
    </div>

    <div class="section" id="menu-section">
        <div class="card">
            <div class="card-body text-center">
                <div class="list-menu">
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/editprofile" class="green" style="font-size: 40px;">
                                <ion-icon name="person-sharp"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Profil</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/presensi/izin" class="danger" style="font-size: 40px;">
                                <ion-icon name="calendar-number"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Cuti</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="presensi/history" class="warning" style="font-size: 40px;">
                                <ion-icon name="document-text"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Histori</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="" class="orange" style="font-size: 40px;">
                                <ion-icon name="location"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            Lokasi
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section mt-2" id="presence-section">
        <div class="todaypresence">
            <div class="row">
                <div class="col-6">
                    <div class="card gradasigreen">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                @if( $presensihariini != NULL)
                                    @php
                                        $path = Storage::url('public/uploads/absensi/'.$presensihariini->foto_in);
                                    @endphp
                                        <img src="{{ url($path) }}" alt="" class="imaged w48">
                                    @else
                                    <ion-icon name="camera"></ion-icon>    
                                @endif
                                </div>
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Masuk</h4>
                                    <span>{{ $presensihariini != NULL ? $presensihariini->jam_in : 'Belum Absen' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card gradasired">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                    @if( $presensihariini != NULL && $presensihariini->jam_out != NULL )
                                        @php
                                            $path = Storage::url('public/uploads/absensi/'.$presensihariini->foto_out);
                                        @endphp
                                            <img src="{{ url($path) }}" alt="" class="imaged w48">
                                        @else
                                            <ion-icon name="camera"></ion-icon>  
                                    @endif
                                </div>
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Pulang</h4>
                                    <span>{{ $presensihariini && $presensihariini->jam_out != NULL ? $presensihariini->jam_out : 'Belum Absen' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="rekappresence">
            <div id="chartdiv"></div> -->
            <!-- <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence primary">
                                    <ion-icon name="log-in"></ion-icon>
                                </div>
                                <div class="presencedetail">
                                    <h4 class="rekappresencetitle">Hadir</h4>
                                    <span class="rekappresencedetail">0 Hari</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence green">
                                    <ion-icon name="document-text"></ion-icon>
                                </div>
                                <div class="presencedetail">
                                    <h4 class="rekappresencetitle">Izin</h4>
                                    <span class="rekappresencedetail">0 Hari</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence warning">
                                    <ion-icon name="sad"></ion-icon>
                                </div>
                                <div class="presencedetail">
                                    <h4 class="rekappresencetitle">Sakit</h4>
                                    <span class="rekappresencedetail">0 Hari</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence danger">
                                    <ion-icon name="alarm"></ion-icon>
                                </div>
                                <div class="presencedetail">
                                    <h4 class="rekappresencetitle">Terlambat</h4>
                                    <span class="rekappresencedetail">0 Hari</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        <!-- </div> -->
        
        <div id="rekappresensi">
            <h3>Rekap Presisi Bulan {{ $namabulan[$bulanini*1] }} Tahun {{ $tahunini}}</h3>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 16px 14px !important">
                            <span class="badge bg-danger" style="position: absolute; top:3px; right:10px; font-size: 0.5rem;
                            z-index:999;">{{ $rekappresensi->jmlhadir }}</span>
                            <ion-icon name="accessibility-outline" style="font-size: 1.6rem;" class="text-primary"></ion-icon>
                            <br><span style="font-size: 0.8rem;">Hadir</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 16px 14px !important">
                            <span class="badge bg-danger" style="position: absolute; top:3px; right:10px; font-size: 0.5rem;
                            z-index:999;">
                            {{ (isset($rekapizin->jmlkeluar) ? $rekapizin->jmlkeluar : 0) + (isset($rekapizin->jmlizin) ? $rekapizin->jmlizin : 0) }}
                            </span>
                            <ion-icon name="newspaper-outline" style="font-size: 1.6rem;" class="text-success"></ion-icon>
                            <br><span style="font-size: 0.8rem;">Izin</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 16px 14px !important">
                            <span class="badge bg-danger" style="position: absolute; top:3px; right:10px; font-size: 0.5rem;
                            z-index:999;">{{ $rekapizin->jmlsakit }}</span>
                            <ion-icon name="medkit-outline" style="font-size: 1.6rem;" class="text-warning"></ion-icon>
                            <br><span style="font-size: 0.8rem;">Sakit</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 16px 14px !important">
                            <span class="badge bg-danger" style="position: absolute; top:3px; right:10px; font-size: 0.5rem;
                            z-index:999;">{{ $rekappresensi->jmlterlambat }}</span>
                            <ion-icon name="alarm-outline" style="font-size: 1.6rem;" class="text-danger"></ion-icon>
                            <br><span style="font-size: 0.8rem;">Telat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="presencetab mt-2">
            <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                <ul class="nav nav-tabs style1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                            Bulan Ini
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                            Leaderboard
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-2" style="margin-bottom:100px;">
                <div class="tab-pane fade show active" id="home" role="tabpanel">
                    <ul class="listview image-listview">
                        
                        @foreach ($historibulanini as $d)
                        
                        <li>
                            <div class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="finger-print-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>{{ date('d-m-Y',strtotime($d->tgl_presensi))}}</div>
                                    <div class="badge badge-success">{{ $d->jam_in }}</div>
                                    <div class="badge badge-danger">
                                        <!-- {{ $presensihariini && $presensihariini->jam_out != NULL ? $d->jam_out : 'Belum Absen' }} -->
                                        {{ $d->jam_out }}
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach       
                    </ul>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel">
                    <ul class="listview image-listview">
                        @foreach( $leaderboard as $data)
                        <li>
                            <div class="item">
                                <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        <b>{{ $data->nama_lengkap}}</b> <br>
                                        <small class="text-mute">{{ $data->jabatan }}</small>
                                    </div>
                                    <span class="badge {{ $data->jam_in < '07:00' ? 'bg-success' : 'bg-danger' }}"> {{ $data->jam_in }} </span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection