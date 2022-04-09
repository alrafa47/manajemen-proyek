<?php

namespace App\Http\Controllers;

use App\Models\Bidangkeahlian;
use App\Http\Requests\StoreBidangkeahlianRequest;
use App\Http\Requests\UpdateBidangkeahlianRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class BidangkeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bidangkeahlian = Bidangkeahlian::all(); // untuk mengambil semua data pegawai
        $data =[
            'bidangkeahlian' => $bidangkeahlian,

        ];
        return view('bidangkeahlian.index',$data);

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
     * @param  \App\Http\Requests\StoreBidangkeahlianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBidangkeahlianRequest $request)
    {
        try {
            Bidangkeahlian::create([
                'nama_bk' => $request->input('nama_bk'),
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
     * @param  \App\Models\Bidangkeahlian  $bidangkeahlian
     * @return \Illuminate\Http\Response
     */
    public function show(Bidangkeahlian $bidangkeahlian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bidangkeahlian  $bidangkeahlian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bidangkeahlian = Bidangkeahlian ::findOrfail ($id);
        $data =[
        'bidangkeahlian' => $bidangkeahlian
    ];
       return view ("bidangkeahlian.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBidangkeahlianRequest  $request
     * @param  \App\Models\Bidangkeahlian  $bidangkeahlian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBidangkeahlianRequest $request, $id)
    {
        try {
            DB::transaction (function () use ($request, $id) {
                $bidangkeahlian = Bidangkeahlian::findOrFail($id);
                $bidangkeahlian->nama_bk = $request->input('nama_bk');
                $bidangkeahlian->save();
            });

            return redirect()->route('bidangkeahlian.index')->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil diupdate']);
        } catch (QueryException $th) {
            dd($th);
            return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bidangkeahlian  $bidangkeahlian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Bidangkeahlian::destroy($id);
            return redirect()->back()->with('pesan', (object)['status' => 'success', 'message' => 'data berhasil dihapus']);
        } catch (QueryException $th) {
            dd($th);
            // return redirect()->back()->with('pesan', (object)['status' => 'danger', 'message' =>'data gagal ditambahkan']);
        }
    }
}
