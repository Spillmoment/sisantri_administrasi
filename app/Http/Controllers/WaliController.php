<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Santri;
use App\User;
use App\WaliSantri;
use App\Wilayah;
use App\PenFormal;
use App\PenDiniah;
use App\PenJurusan;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        // $wilayah = Wilayah::all();
        // $penFormal = PenFormal::all();
        // $penDiniah = PenDiniah::all();
        // $penJurusan = PenJurusan::all();
        $wali_santri = WaliSantri::where('id',$user->id)->get();
        // foreach ($wali_santri as $item) {
        //     $santri = Santri::where('id_wali_santri',$item->id_wali_santri)->get();   
        //     foreach ($santri as $san) {
        //         $santriWilayah = Wilayah::where('id_wilayah',$san->id_wilayah)->get();
        //     }
        //     foreach ($santri as $san) {
        //         $santriPenFormal = PenFormal::where('kd_jp_formal',$san->kd_jp_formal)->get();
        //     }
        //     foreach ($santri as $san) {
        //         $santriPenDiniah = PenDiniah::where('kd_jp_diniah',$san->kd_jp_diniah)->get();
        //     }
        //     foreach ($santri as $san) {
        //         $santriPenJurusan = PenJurusan::where('kd_jurusan',$san->kd_jurusan)->get();
        //     }
        // }
        

        return view('data.data_wali', compact('user','wali_santri'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|email|max:255',
        //     'username' => 'required|max:100',
        //     'password' => 'sometimes|nullable|min:6'
        // ]);
             
        // dd($request->all());
        $wali_santri = WaliSantri::findOrFail($id);

        $wali_santri->nama_suami = $request->nama_suami;
        $wali_santri->tgl_suami = $request->tgl_suami;
        $wali_santri->pendidikan_suami = $request->pendidikan_suami;
        $wali_santri->penghasilan_suami = $request->penghasilan_suami;
        $wali_santri->nama_istri = $request->nama_istri;
        $wali_santri->tgl_istri = $request->tgl_istri;
        $wali_santri->pendidikan_istri = $request->pendidikan_istri;
        $wali_santri->penghasilan_istri = $request->penghasilan_istri;
        $wali_santri->save();

        return redirect()->route('wali.index')->with('status','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
