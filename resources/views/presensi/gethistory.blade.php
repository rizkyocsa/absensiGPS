@if($history->isEmpty())
    <div class="alert alert-outline-warning">
        <p>Tidak Ada Data</p>
    </div>
@endif

@foreach($history as $data)
<ul class="listview image-listview">
    <li>
        <div class="item">
            @php 
                $path = Storage::url('uploads/absensi/'.$data->foto_in)
            @endphp
            <img src="{{url($path)}}" alt="image" class="image">
            <div class="in">
                <div>
                    <b>{{date("d-m-Y",strtotime($data->tgl_presensi))}}</b> <br>
                    
                </div>
                <span class="badge {{ $data->jam_in < '07:00' ? 'bg-success' : 'bg-danger' }}"> {{ $data->jam_in }} </span>
                <span class="badge bg-primary"> {{ $data->jam_out }} </span>
            </div>
        </div>
    </li>
</ul>
@endforeach