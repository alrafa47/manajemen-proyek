<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Pegawai;
use App\Models\Tugas;
use App\Http\Requests\StoreProyekRequest;
use App\Http\Requests\UpdateProyekRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyek = Proyek::all();
        $pegawai = Pegawai::all(); // untuk mengambil semua data pegawai
        // return view('pegawai.index', compact('pegawai', 'jabatan'));
        $data =[
            'proyek' => $proyek,
            'pegawai' => $pegawai
        ];
        return view('proyek.index',$data);

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
     * @param  \App\Http\Requests\StoreProyekRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProyekRequest $request)
    {
        try {
            DB::transaction(function () use ($request)  {
                Proyek::create([
                    'nama_proyek' => $request->input('nama_proyek'),
                    'tgl_mulai' => $request->input('tgl_mulai'),
                    'tgl_selesai' => $request->input('tgl_selesai'),
                    'spk' => $request->input('spk'),
                    'bast' => $request->input('bast'),
                    'kontrak_kerja' => $request->input('kontrak_kerja'),
                    'nama_klien' => $request->input('nama_klien'),
                    'tlp_klien' => $request->input('tlp_klien'),
                    'alamat_klien' => $request->input('alamat_klien'),
                    'pegawai_id' => $request->input('pegawai'),
                    'lap_pendahuluan' => $request->input('lap_pendahuluan'),
                    'lap_akhir' => $request->input('lap_akhir'),
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
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function show(Proyek $proyek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyek = Proyek ::findOrfail ($id);
        $pegawai = Pegawai::all();
        $tugas = Tugas::all();
        $data =[
        'proyek' => $proyek,
        'pegawai' => $pegawai,
        'tugas' => $tugas,
    ];
       return view ("proyek.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProyekRequest  $request
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProyekRequest $request, $id)
    {
        try {
            DB::transaction (function () use ($request, $id) {
                $proyek = Proyek::findOrFail($id);
                $proyek->nama_proyek = $request->input('nama_proyek');
                $proyek->tgl_mulai = $request->input('tgl_mulai');
                $proyek->tgl_selesai = $request->input('tgl_selesai');
                $proyek->spk = $request->input('spk');
                $proyek->bast = $request->input('bast');
                $proyek->kontrak_kerja = $request->input('kontrak_kerja');
                $proyek->nama_klien = $request->input('nama_klien');
                $proyek->tlp_klien = $request->input('tlp_klien');
                $proyek->alamat_klien = $request->input('alamat_klien');
                $proyek->pegawai_id = $request->input('pegawai');
                $proyek->lap_pendahuluan = $request->input('lap_pendahuluan');
                $proyek->lap_akhir = $request->input('lap_akhir');
                $proyek->save();

            });

            return redirect()->route('proyek.index')->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil diupdate']);
        } catch (QueryException $th) {
            dd($th);
            return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal diupdate']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Proyek::destroy($id);
            return redirect()->back()->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil dihapus']);
        } catch (QueryException $th) {
            dd($th);
            // return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal ditambahkan']);
        }
    }
}
