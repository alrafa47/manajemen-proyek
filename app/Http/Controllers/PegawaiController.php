<?php

namespace App\Http\Controllers;

// import
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use Illuminate\Support\Facades\Hash;

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
        $data = [
            'jabatan' => $jabatan,
            'pegawai' => $pegawai
        ];
        return view('pegawai.index', $data);
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
            DB::transaction(function () use ($request) {
                $pegawai = Pegawai::create([
                    'nama_pegawai' => $request->input('nama_pegawai'),
                    'jenis_kelamin' => $request->input('jenis_kelamin'),
                    'alamat_pegawai' => $request->input('alamat_pegawai'),
                    'tlp_pegawai' => $request->input('tlp_pegawai'),
                    'kualifikasi' => $request->input('kualifikasi'),
                    'jabatan_id' => $request->input('jabatan'),
                ]);
                $pegawai->user()->create([
                    'email' => $request->input('email_pegawai'),
                    'password' => Hash::make($request->input('password')),
                    'name' => $request->input('username'),
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
    public function edit($id)
    {
       $pegawai = Pegawai ::findOrfail ($id);
       $jabatan = Jabatan::all();
       $data =[
        'pegawai' => $pegawai,
        'jabatan' => $jabatan
    ];
       return view ("pegawai.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegawaiRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePegawaiRequest $request, $id)
    {
        try {
            DB::transaction (function () use ($request, $id) {
                $pegawai = Pegawai::findOrFail($id);
                $pegawai->nama_pegawai = $request->input('nama_pegawai');
                $pegawai->jenis_kelamin = $request->input('jenis_kelamin');
                $pegawai->alamat_pegawai = $request->input('alamat_pegawai');
                $pegawai->tlp_pegawai = $request->input('tlp_pegawai');
                $pegawai->kualifikasi = $request->input('kualifikasi');
                $pegawai->jabatan_id = $request->input('jabatan');
                $pegawai->save();
                $pegawai->user->email = $request->input('email_pegawai');
                $pegawai->user->password = $request->input('password');
                $pegawai->user->name = $request->input('username');
                $pegawai->user->save();
            });

            return redirect()->route('pegawai.index')->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil diupdate']);
        } catch (QueryException $th) {
            dd($th);
            return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal diupdate']);
        }

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
            User::where([['userable_id', $id], ['userable_type', User::class]])->delete();
            return redirect()->back()->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil dihapus']);
        } catch (QueryException $th) {
            dd($th);
            // return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal ditambahkan']);
        }
    }
}
