<?php

namespace App\Http\Controllers;

use App\Models\Penugasan;
use App\Models\Tugas;
use App\Http\Requests\StorePenugasanRequest;
use App\Http\Requests\UpdatePenugasanRequest;
use Illuminate\Database\QueryException;

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
        $tugas = Tugas::all(); // untuk mengambil semua data tugas
        // return view('tugas.index', compact('tugas', 'penugasan'));
        $data =[
            'penugasan' => $penugasan,
            'tugas' => $tugas
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
            DB::transaction(function () {
                Penugasan::create([
                    'tugas_id' => $request->input('tugas'),
                    'judul_tugas' => $request->input('judul_tugas'),
                    'deskripsi_tugas' => $request->input('deskripsi_tugas'),
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
    public function edit(Penugasan $penugasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenugasanRequest  $request
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenugasanRequest $request, Penugasan $penugasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penugasan  $penugasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penugasan $penugasan)
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
