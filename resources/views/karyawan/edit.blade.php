<form action="/panel/karyawan/{{ $karyawan->nik }}/update" method="POST" id="frmKaryawan" enctype="multipart/form-data">
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
            <input type="text" name="nik" value="{{ $karyawan->nik }}" class="form-control" id="nik" placeholder="NIK" readonly>                        
    </div>

    <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                </svg>
            </span>
            <input type="text" name="nama_lengkap" value="{{ $karyawan->nama_lengkap }}" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap">
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
            <input type="text" name="jabatan" value="{{ $karyawan->jabatan }}"  class="form-control" id="jabatan" placeholder="Jabatan">
    </div>

    <div class="input-icon mb-3">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                </svg>
            </span>
            <input type="text" name="no_hp" value="{{ $karyawan->no_hp }}" class="form-control" id="no_hp" placeholder="No HP">
    </div>

    <div class="mb-3">
        <input type="file" class="form-control" name="foto" id="foto">
        <input type="hidden" name="old_foto" value="{{ $karyawan->foto }}">
    </div>

    <div class="row">
        <div class="col-12">
            <select name="kode_dept" id="kode_dpt" class="form-select">
                <option value=""> Departemen </option>
                @foreach($departemen as $data)
                    <option {{ $karyawan->kode_dept == $data->kode_dept ? 'selected' : '' }}
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

