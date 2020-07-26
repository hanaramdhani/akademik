<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;


use Illuminate\Support\Facades\DB;

use App\MatkulModel;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = DB::table('matkul')->get();
        foreach($result as $k => $v){
            $result[$k]->detail = 'localhost/api/getmatkul/' . $v->id;
            $result[$k]->hapus = 'localhost/api/matkul/' . $v->id;
        }
        return response($result);
    }

    /**
     * @param String $idgit
     */
    function getById($id)
    {
        return response(DB::table('matkul')->where('id', $id)->get());
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
        $matkul = [
            'id' => Str::random(5),
            'nama_matkul' => $request->matkul,
            'sks' => $request->sks,
            'prodi' => $request->prodi,
        ];
        try {
            DB::table('matkul')->insert($matkul);
            return response(['message' => 'Berhasil menambahkan mata kuliah ' . $matkul['nama_matkul']]);
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
    public function update(Request $request, $id)
    {
        $matkul = [];
        if (isset($request->matkul))
            $matkul['nama_matkul'] = $request->matkul;
        if (isset($request->sks))
            $matkul['sks'] = $request->sks;
        if (isset($request->prodi))
            $matkul['prodi'] = $request->prodi;
        try {
            DB::table('matkul')->where('id', $id)->update($matkul);
            return response(['message' => 'Berhasil Memperbarui mata kuliah dengan id ' . $id]);
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
    public function destroy($id)
    {
        //
        try {
            DB::table('matkul')->where('id', $id)->delete();
            return response(['message' => 'Berhasil Menghapus mata kuliah dengan id ' . $id]);
        } catch (\Throwable $th) {
            return response(['masage' => 'terjadi kesalahan', 'error' => $th], 500);
        }
    }
}
