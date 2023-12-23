<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;


use App\Models\Departemen;

class DepartemenController extends Controller
{
    public function index()
    {
        // $query = Departemen::query();
        // $query->select('*');
        // $query->orderBy('nama_dept');
        $data['departemen'] = Departemen::orderBy('nama_dept', 'asc')->get();
        // dd($departemen);
        // // if( !empty($request->nama_dept) ){
        // //     $query->where('nama_dept','like','%'.$request->nama_dept.'%');
        // // }
        
        // $departemen = $query->paginate(10);
        // $departemen = $query->get();

        // $departemen = DB::table('departemen')->get();
        // dd($departemen);

        return view('departemen.index')->with($data);
    }

    public function store(Request $request)
    {
        $kode_dept = $request->kode_dept;
        $nama_dept = $request->nama_dept;

        try{
            $data = [
                'kode_dept' => $kode_dept,
                'nama_dept' =>  $nama_dept
            ];

            $simpan = DB::table('departemen')->insert($data);

            if($simpan){
                return Redirect::back()->with(['success' => 'Data Berhasil Di Tambahkan']);
            }   
            
        }catch(Exception $e){
            
            return Redirect::back()->with(['warning' => 'Data Gagal Di Tambahkan']);
        }

        return view('departemen.index', compact('departemen'));
    }

    public function edit(Request $request)
    {
        $kode_dept = $request->kode_dept;
        $departemen = DB::table('departemen')->where('kode_dept', $kode_dept)->first();
        // dd($departemen);
        return view('departemen.edit', compact('departemen'));
    }

    public function update($kode_dept, Request $request)
    {
        $kode_dept = $request->kode_dept;
        $nama_dept = $request->nama_dept;

        try{
            $data = [
                'nama_dept' =>  $nama_dept
            ];

            $update = DB::table('departemen')->where('kode_dept', $kode_dept)->update($data);

            if($update){
                return Redirect::back()->with(['success' => 'Data Berhasil Di Update']);
            }   
            
        }catch(Exception $e){
            
            return Redirect::back()->with(['warning' => 'Data Gagal Di Update']);
        }

        return view('departemen.index');
    }
}
