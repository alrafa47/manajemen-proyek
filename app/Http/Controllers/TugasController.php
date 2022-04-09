<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Bidangkeahlian;
use App\Models\Proyek;
use App\Models\Penugasan;
use App\Models\Pegawai;
use App\Http\Requests\StoreTugasRequest;
use App\Http\Requests\UpdateTugasRequest;
use Illuminate\Database\QueryException;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugas = Tugas::all();
        $bidangkeahlian = Bidangkeahlian::all();
        $proyek = Proyek::all();
        $penugasan = Penugasan::all();
        $pegawai = Pegawai::all(); // untuk mengambil semua data pegawai
        // return view('pegawai.index', compact('pegawai', 'jabatan'));
        $data =[
            'tugas' => $tugas,
            'bidangkeahlian' => $bidangkeahlian,
            'proyek' => $proyek,
            'penugasan' => $penugasan,
            'pegawai' => $pegawai
        ];
        return view('tugas.index',$data);
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
     * @param  \App\Http\Requests\StoreTugasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTugasRequest $request)
    {
        try {
            DB::transaction(function () {
                Tugas::create([
                    'bidangkeahlian' => $request->input('nama_bk'),
                    'pegawai_id' => $request->input('pegawai'),
                    'proyek_id' => $request->input('proyek'),
                    'tgl_mulai' => $request->input('tgl_mulai'),
                    'tgl_selesai' => $request->input('tgl_selesai'),
                ]);
                User::create([
                    'email' =>$request->input('email_pegawai'),
                    'password' =>$request->input('password'),
                    'name' =>$request->input('username'),
                ]);
            });

            return redirect()->back()->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil ditambahkan']);
        } catch (QueryException $th) {
            dd($th);
            // return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tugas $tugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTugasRequest  $request
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTugasRequest $request, Tugas $tugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tugas $tugas)
    {
        try {
            Tugas::destroy($id);
            return redirect()->back()->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil dihapus']);
        } catch (QueryException $th) {
            dd($th);
            // return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal ditambahkan']);
        }
    }
}
