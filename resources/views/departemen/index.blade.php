@extends('layout.admin.master')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Departemen
                </div>
                <h2 class="page-title">
                    Data Departemen
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
                                <a href="" class="btn btn-primary" data-bs-toggle="modal" id="btnTambahDepartemen" >
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
                                <form action="/panel/departemen" method="GET">
                                    <div class="row">
                                        <!-- <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" name="nama_dept" id="nama_dept" class="form-control" placeholder="Nama Departemen" value="{{ Request('nama_dept')}}">
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-4">
                                            <div class="form-group">
                                                <select name="kode_dept" id="kode_dpt" class="form-select">
                                                    <option value=""> Departemen </option>
                                                    @foreach($departemen as $data)
                                                        <option {{ Request('kode_dept') == $data->kode_dept ? 'selected' : '' }}
                                                         value="{{ $data->kode_dept }}"> {{ $data->nama_dept }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-2">
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
                                        </div> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kode Departemen</td>
                                    <td>Nama Departemen</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departemen as $data)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $data->kode_dept}}</td>
                                        <td>{{ $data->nama_dept}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="" data-bs-toggle="modal"><i class="edit btn btn-info" kode_dept="{{ $data->kode_dept }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                </i></a>
                                                <div class="p-1"></div>
                                                <!-- <form method="post" action="/panel/departemen/{{ $data->kode_dept }}/delete">
                                                    @csrf    
                                                    @method('DELETE')
                                                    <a class="btn btn-danger delete-confirm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" stroke-width="0" fill="currentColor"></path>
                                                            <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor"></path>
                                                        </svg>
                                                    </a>
                                                </form> -->
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-inputdept" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Departemen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/panel/departemen/store" method="POST" id="frmDepartemen" enctype="multipart/form-data">
                    @csrf

                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                        <input type="text" name="kode_dept" class="form-control" id="kode_dept"
                            placeholder="Kode Departemen">
                    </div>

                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 21l18 0"></path>
                                <path d="M9 8l1 0"></path>
                                <path d="M9 12l1 0"></path>
                                <path d="M9 16l1 0"></path>
                                <path d="M14 8l1 0"></path>
                                <path d="M14 12l1 0"></path>
                                <path d="M14 16l1 0"></path>
                                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path>
                            </svg>
                        </span>
                        <input type="text" name="nama_dept" class="form-control" id="nama_dept"
                            placeholder="Nama Departemen">
                    </div>

                    <div class="mt-2">
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 14l11 -11"></path>
                                        <path
                                            d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5">
                                        </path>
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
</div>


<div class="modal modal-blur fade" id="modal-editdept" tabindex="-1" role="dialog" aria-hidden="true">
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
        $("#btnTambahDepartemen").click(function(){
            $("#modal-inputdept").modal("show");
        });

        $(".edit").click(function(){
            var kode_dept = $(this).attr('kode_dept'); 
            // alert(kode_dept);
            $.ajax({
                type: 'POST',
                url: '/panel/departemen/edit',
                cache: false,
                data:{
                    _token: '{{ csrf_token(); }}',
                    kode_dept: kode_dept
                },
                success:function(respond){
                    $("#loadededitform").html(respond);
                }
            });  
            $("#modal-editdept").modal("show");
        });

    });
</script>

@endpush