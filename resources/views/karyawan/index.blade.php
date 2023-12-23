@extends('layout.admin.master')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Karyawan
                </div>
                <h2 class="page-title">
                    Data Karyawan
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-12">
                                @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                                @endif

                                @if (Session::get('warning'))
                                <div class="alert alert-warning">
                                    {{Session::get('warning')}} 
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <a href="" class="btn btn-primary" data-bs-toggle="modal" id="btnTambahKaryawan" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>    
                                Tambah Data</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">                           
                                <form action="/panel/karyawan" method="GET">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" placeholder="Nama Karyawan" value="{{ Request('nama_karyawan')}}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <select name="kode_dept" id="kode_dpt" class="form-select">
                                                    <option value=""> Departemen </option>
                                                    @foreach($departemen as $data)
                                                        <option {{ Request('kode_dept') == $data->kode_dept ? 'selected' : '' }}
                                                         value="{{ $data->kode_dept }}"> {{ $data->nama_dept }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <button class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                        <path d="M21 21l-6 -6"></path>
                                                    </svg>
                                                    Cari
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>NIK</td>
                                    <td>Nama</td>
                                    <td>Jabatan</td>
                                    <td>No.hp</td>
                                    <td>Foto</td>
                                    <td>Departemen</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawan as $data)
                                @php
                                    $path = Storage::url('upload/karyawan/'.$data->foto)
                                @endphp
                                    <tr>
                                        <td>{{ $loop->iteration + $karyawan->firstItem() - 1}}</td>
                                        <td>{{ $data->nik}}</td>
                                        <td>{{ $data->nama_lengkap}}</td>
                                        <td>{{ $data->jabatan}}</td>
                                        <td>{{ $data->no_hp}}</td>
                                        <td>
                                            @if(empty($data->foto))
                                                <img src="{{ asset('assets/img/default-avatar.png') }}" alt="" class="avatar">
                                            @else
                                                <img src="{{ url($path) }}" alt="" class="avatar">
                                            @endif
                                        </td>
                                        <td>{{ $data->nama_dept}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="" data-bs-toggle="modal"><i class="edit btn btn-info" nik="{{ $data->nik }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                </i></a>
                                                <div class="p-1"></div>
                                                <form method="post" action="/panel/karyawan/{{ $data->nik }}/delete">
                                                    @csrf    
                                                    <!-- @method('DELETE') -->
                                                    <a class="btn btn-danger delete-confirm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" stroke-width="0" fill="currentColor"></path>
                                                            <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor"></path>
                                                        </svg>
                                                    </a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $karyawan->links('vendor.pagination.bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="modal modal-blur fade" id="modal-inputkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/panel/karyawan/store" method="POST" id="frmKaryawan" enctype="multipart/form-data">
                    @csrf

                    <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                                    <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                                    <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                                    <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                                    <path d="M5 11h1v2h-1z"></path>
                                    <path d="M10 11l0 2"></path>
                                    <path d="M14 11h1v2h-1z"></path>
                                    <path d="M19 11l0 2"></path>
                                </svg>
                            </span>
                            <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK">                        
                    </div>

                    <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </span>
                            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap">
                    </div>

                    <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-analytics" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 4m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z"></path>
                                    <path d="M7 20l10 0"></path>
                                    <path d="M9 16l0 4"></path>
                                    <path d="M15 16l0 4"></path>
                                    <path d="M8 12l3 -3l2 2l3 -3"></path>
                                </svg>
                            </span>
                            <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan">
                    </div>

                    <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                                </svg>
                            </span>
                            <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No HP">
                    </div>

                    <div class="mb-3">
                        <input type="file" class="form-control" name="foto" id="foto">
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <select name="kode_dept" id="kode_dpt" class="form-select">
                                <option value=""> Departemen </option>
                                @foreach($departemen as $data)
                                    <option {{ Request('kode_dept') == $data->kode_dept ? 'selected' : '' }}
                                    value="{{ $data->kode_dept }}" id="kode_dept"> {{ $data->nama_dept }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 14l11 -11"></path>
                                        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                                    </svg>    
                                Simpan
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    
    <div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadededitform">
                   
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('myscript')
<script>
    $(function(){

        $("#btnTambahKaryawan").click(function(){
            $("#modal-inputkaryawan").modal("show");
        });

        $(".edit").click(function(){
            var nik = $(this).attr('nik');
            // alert(nik);
            $("#modal-inputkaryawan").modal("show");
            $.ajax({
                type: 'POST',
                url: '/panel/karyawan/edit',
                cache: false,
                data:{
                    _token: '{{ csrf_token(); }}',
                    nik: nik
                },
                success:function(respond){
                    $("#loadededitform").html(respond);
                }
            });
            $("#modal-editkaryawan").modal("show");
            
        });

        $(".delete-confirm").click(function(e){
            var form = $(this).closest('form');
            e.preventDefault();
            swal.fire('test');
            swal.fire({
                title: 'Apakah anda yakin data ini dihapus ?',
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                // denyButtonText: 'CANCEL',
            }).then((result)=>{
                if(result.isConfirmed){
                    form.submit();
                    swal.fire('Deleted','','success')
                }
                // else if(result.isDenied){
                //     swal.fire('','','info')
                // }
            })
            // $("#modal-inputkaryawan").modal("show");
        });

        $("#frmKaryawan").submit(function(){
            var nik = $("#nik").val();
            var nama_lengkap = $("#nama_lengkap").val();
            var jabatan = $("#jabatan").val();
            var no_hp = $("#no_hp").val();
            var kode_dept = $("#kode_dept").val();
            var foto = $("#foto").val();
            if(nik == ""){                
                Swal.fire({
                    title: 'Warning!',
                    text: 'Nik harus diisi',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    $('#nik').focus();
                });

                return false;
            }else if(nama_lengkap == ""){                
                Swal.fire({
                    title: 'Warning!',
                    text: 'Nama lengkap harus diisi',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    $('#nama_lengkap').focus();
                });

                return false;
            }else if(jabatan == ""){                
                Swal.fire({
                    title: 'Warning!',
                    text: 'Jabatan harus diisi',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    $('#jabatan').focus();
                });

                return false;
            }else if(no_hp == ""){                
                Swal.fire({
                    title: 'Warning!',
                    text: 'No HP harus diisi',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    $('#no_hp').focus();
                });

                return false;
            }else if(kode_dept == ""){                
                Swal.fire({
                    title: 'Warning!',
                    text: 'Departemen harus dipilih',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    $('#kode_dept').focus();
                });

                return false;
            }else if(foto == ""){                
                Swal.fire({
                    title: 'Warning!',
                    text: 'Departemen harus dipilih',
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    $('#foto').focus();
                });

                return false;
            }
        });
        
        return false;
    });
</script>
@endpush


