<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table('mahasiswa')->get();
   
        return response($result);
        //
        //
    }
           /**
     * @param String $idgit
     */
    function getById($nim)
    {
        return response(DB::table('mahasiswa')->where('nim', $nim)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mahasiswa = [
            'nim' => Str::random(20),
            'nama_mahasiswa' => $request->mahasiswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'mata_kuliah'=> $request->mata_kuliah,
            'alamat' => $request->alamat,
        ];
        try {
            DB::table('mahasiswa')->insert($mahasiswa);
            return response(['message' => 'Berhasil menambahkan nama mahasiswa ' . $mahasiswa['nama_mahasiswa']]);
        } catch (\Throwable $th) {
            return response(['masage' => 'terjadi kesalahan', 'error' => $th], 500);
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $mahasiswa = [];
        if (isset($request->mahasiswa))
            $mahasiswa['nama_mahasiswa'] = $request->mahasiswa;
        if (isset($request->jenis_kelamin))
            $dosen['jenis_kelamin'] = $request->jenis_kelamin;
        if (isset($request->mata_kuliah))
            $dosen['mata_kuliah'] = $request->mata_kuliah;
        if (isset($request->alamat))
            $dosen['alamat'] = $request->alamat;
        try {
            DB::table('mahasiswa')->where('nim', $nim)->update($mahasiswa);
            return response(['message' => 'Berhasil Memperbarui dosen dengan nim ' . $nim]);
        } catch (\Throwable $th) {
            return response(['masage' => 'terjadi kesalahan', 'error' => $th], 500);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        try {
            DB::table('mahasiswa')->where('nim', $nim)->delete();
            return response(['message' => 'Berhasil Menghapus   dengan nim ' . $nim]);
        } catch (\Throwable $th) {
            return response(['masage' => 'terjadi kesalahan', 'error' => $th], 500);
        }
        //
    }
}
