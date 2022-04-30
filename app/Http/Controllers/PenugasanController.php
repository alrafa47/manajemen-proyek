<?php

namespace App\Http\Controllers;

use App\Models\Penugasan;
use App\Models\Tugas;
use App\Models\Pegawai;
use App\Models\File;
use App\Http\Requests\StorePenugasanRequest;
use App\Http\Requests\UpdatePenugasanRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class PenugasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penugasan = Penugasan::all();
        $tugas = Tugas::all();
        $pegawai = Pegawai::all(); // untuk mengambil semua data tugas
        // return view('tugas.index', compact('tugas', 'penugasan'));
        $data =[
            'penugasan' => $penugasan,
            'tugas' => $tugas,
            'pegawai' => $pegawai
        ];
        return view('penugasan.index',$data);
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
     * @param  \App\Http\Requests\StorePenugasanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenugasanRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                Penugasan::create([
                    'pegawai_id' => $request->input('pegawai'),
                    'tugas_id' => $request->input('tugas'),
                    'judul_tugas' => $request->input('judul_tugas'),
                    'deskripsi_tugas' => $request->input('deskripsi_tugas'),
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
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function show(Penugasan $penugasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penugasan = Penugasan ::findOrfail ($id);
        $tugas = Tugas::all();
        $file = File::all();
        $pegawai = Pegawai::all();
        $data =[
        'penugasan' => $penugasan,
        'tugas' => $tugas,
        'file' => $file,
        'pegawai' =>$pegawai,
    ];
       return view ("penugasan.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenugasanRequest  $request
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenugasanRequest $request, $id)
    {
        try {
            DB::transaction (function () use ($request, $id) {
                $penugasan = Penugasan::findOrFail($id);
                $penugasan->pegawai_id = $request->input('pegawai');
                $penugasan->tugas_id = $request->input('tugas');
                $penugasan->judul_tugas = $request->input('judul_tugas');
                $penugasan->deskripsi_tugas = $request->input('deskripsi_tugas');
                $penugasan->save();
            });

            return redirect()->route('penugasan.index')->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil diupdate']);
        } catch (QueryException $th) {
            dd($th);
            return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal diupdate']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Penugasan::destroy($id);
            return redirect()->back()->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil dihapus']);
        } catch (QueryException $th) {
            dd($th);
            // return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal ditambahkan']);
        }
    }
}
