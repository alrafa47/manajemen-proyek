<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all(); // untuk mengambil semua data pegawai
        $data =[
            'jabatan' => $jabatan,

        ];
        return view('jabatan.index',$data);

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
     * @param  \App\Http\Requests\StoreJabatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJabatanRequest $request)
    {
        try {
                Jabatan::create([
                    'nama_jabatan' => $request->input('nama_jabatan'),
                ]);

            return redirect()->back()->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil ditambahkan']);
        } catch (QueryException $th) {
            dd($th);
            // return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJabatanRequest  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJabatanRequest $request, Jabatan $jabatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Jabatan::destroy($id);
            return redirect()->back()->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil dihapus']);
        } catch (QueryException $th) {
            dd($th);
            // return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal ditambahkan']);
        }
    }
}
