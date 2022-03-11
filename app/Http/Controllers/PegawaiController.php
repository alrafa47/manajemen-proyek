<?php

namespace App\Http\Controllers;

// import
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\User;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use Illuminate\Database\QueryException;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        $pegawai = Pegawai::all(); // untuk mengambil semua data pegawai
        // return view('pegawai.index', compact('pegawai', 'jabatan'));
        $data =[
            'jabatan' => $jabatan,
            'pegawai' => $pegawai
        ];
        return view('pegawai.index',$data);

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
     * @param  \App\Http\Requests\StorePegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePegawaiRequest $request)
    {
        try {
            DB::transaction(function () {
                Pegawai::create([
                    'nama_pegawai' => $request->input('nama_pegawai'),
                    'jenis_kelamin' => $request->input('jenis_kelamin'),
                    'alamat_pegawai' => $request->input('alamat_pegawai'),
                    'tlp_pegawai' => $request->input('tlp_pegawai'),
                    'kualifikasi' => $request->input('kualifikasi'),
                    'jabatan_id' => $request->input('jabatan'),
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
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegawaiRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Pegawai::destroy($id);
            return redirect()->back()->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil dihapus']);
        } catch (QueryException $th) {
            dd($th);
            // return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal ditambahkan']);
        }
    }
}
