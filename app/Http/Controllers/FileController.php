<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Penugasan;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = File::all();
        $penugasan = Penugasan::all();
        $data =[
            'file' => $file,
            'penugasan' => $penugasan
        ];
        return view('file.index',$data);
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
     * @param  \App\Http\Requests\StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {
        try {
            DB::transaction(function () use ($request){
                File::create([
                    'created_by' => $request->input('created_by'),
                    'penugasan_id' => $request->input('penugasan'),
                    'file' => $request->input('file'),
                    'acc' => $request->input('acc'),
                    'deskripsi' => $request->input('deskripsi'),
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
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = File ::findOrfail ($id);
        $penugasan = Penugasan::all();
        $data =[
        'file' => $file,
        'penugasan' => $penugasan,
    ];
       return view ("file.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFileRequest  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileRequest $request, $id)
    {
        try {
            DB::transaction (function () use ($request, $id) {
                $file = File::findOrFail($id);
                $file->created_by = $request->input('created_by');
                $file->penugasan_id = $request->input('penugasan');
                $file->file = $request->input('file');
                $file->acc = $request->input('acc');
                $file->deskripsi = $request->input('deskripsi');
                $file->save();

            });

            return redirect()->route('file.index')->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil diupdate']);
        } catch (QueryException $th) {
            dd($th);
            return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            File::destroy($id);
            return redirect()->back()->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil dihapus']);
        } catch (QueryException $th) {
            dd($th);
            // return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal ditambahkan']);
        }
    }
}
