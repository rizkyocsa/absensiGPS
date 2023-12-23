<form action="/panel/departemen/{{ $departemen->kode_dept }}/update" method="POST" id="frmDepartemen" enctype="multipart/form-data">
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
        <input type="text" name="kode_dept" class="form-control" id="kode_dept" value="{{ $departemen->kode_dept }}" placeholder="Kode Departemen">                        
    </div>

    <div class="input-icon mb-3">
        <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
        <input type="text" name="nama_dept" class="form-control" id="nama_dept" value="{{ $departemen->nama_dept }}" placeholder="Nama Departemen">
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