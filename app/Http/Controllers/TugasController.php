<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Bidangkeahlian;
use App\Models\Proyek;
use App\Models\Penugasan;
use App\Http\Requests\StoreTugasRequest;
use App\Http\Requests\UpdateTugasRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($proyek_id)
    {
        $tugas = Tugas::with('Penugasan')->where('proyek_id', $proyek_id)->get();
        $bidangkeahlian = Bidangkeahlian::all();
        $proyek = Proyek::find($proyek_id);
        $data = [
            'tugas' => $tugas,
            'bidangkeahlian' => $bidangkeahlian,
            'proyek' => $proyek,
        ];
        return view('tugas.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTugasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTugasRequest $request, $proyek_id)
    {
        try {
            DB::transaction(function () use ($request, $proyek_id) {
                Tugas::create([
                    'bidangkeahlian_id' => $request->input('bidangkeahlian'),
                    'proyek_id' => $proyek_id,
                    'tgl_mulai' => $request->input('tgl_mulai'),
                    'tgl_selesai' => $request->input('tgl_selesai'),
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugas = Tugas::findOrfail($id);
        $bidangkeahlian = Bidangkeahlian::all();
        $proyek = Proyek::all();
        $penugasan = Penugasan::all();
        $data = [
            'tugas' => $tugas,
            'bidangkeahlian' => $bidangkeahlian,
            'proyek' => $proyek,
            'penugasan' => $penugasan,
        ];
        return view("tugas.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTugasRequest  $request
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTugasRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $tugas = Tugas::findOrFail($id);
                $tugas->bidangkeahlian_id = $request->input('bidangkeahlian');
                $tugas->proyek_id = $request->input('proyek');
                $tugas->tgl_mulai = $request->input('tgl_mulai');
                $tugas->tgl_selesai = $request->input('tgl_selesai');
                $tugas->save();
            });

            return redirect()->route('tugas.index')->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil diupdate']);
        } catch (QueryException $th) {
            dd($th);
            return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' => 'data gagal diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
