@extends('layout.admin.master')

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Presensi
                </div>
                <h2 class="page-title">
                    Monitoring Presensi
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
                        <div class="row">
                            <div class="col-12">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M11.5 21h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4.5"></path>
                                        <path d="M16 3v4"></path>
                                        <path d="M8 3v4"></path>
                                        <path d="M4 11h16"></path>
                                        <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                        <path d="M20.2 20.2l1.8 1.8"></path>
                                    </svg>
                                    </span>
                                    <input type="text" class="form-control" id="tanggal" value="{{ date('Y-m-d') }}" name="tanggal" placeholder="Tanggal Presensi">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nik</td>
                                            <td>Nama Karyawan</td>
                                            <td>Departemen</td>
                                            <td>Jam Masuk</td>
                                            <td>Foto</td>
                                            <td>Jam Pulang</td>
                                            <td>Foto</td>
                                            <td>Keterangan</td>
                                        </tr>
                                    </thead>
                                    <tbody id="loadpresensi">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('myscript')
<script>
    $(function () {
        $("#tanggal").datepicker({ 
                autoclose: true, 
                todayHighlight: true,
                format: 'yyyy-mm-dd'
        }).datepicker('update', new Date());

        function loadpresensi(){
            var tanggal = $('#tanggal').val();
            // alert(tanggal);
            $.ajax({
                type: 'POST',
                url: '/panel/getpresensi',
                data:{
                    _token: "{{ csrf_token() }}",
                    tanggal: tanggal
                },
                cahce: false,
                success: function(respond){
                    $("#loadpresensi").html(respond);
                }   
            });
        }

        $("#tanggal").change(function(e){
            loadpresensi();
        });

        loadpresensi();
    });
</script>
@endpush