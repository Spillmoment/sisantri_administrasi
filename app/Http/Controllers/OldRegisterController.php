<?php

namespace App\Http\Controllers;

use App\Santri;
use App\WaliSantri;
use App\User;
use App\JenjangPendidikan;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep1(Request $request)
    {
      $user = $request->session()->get('user');
      return view('daftar.create-step1',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStep1(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6'
      ]);

      if(empty($request->session()->get('user'))){
          $user = new User();
          $user->fill($validatedData);
          $request->session()->put('user', $user);
      }else{
          $user = $request->session()->get('user');
          $user->fill($validatedData);
          $request->session()->put('user', $user);
      }

      return redirect('/daftar/create-step2');
    }

    
    public function createStep2(Request $request)
    {
      $pendidikan = $request->session()->get('pendidikan');
      return view('daftar.create-step2',compact('pendidikan', $pendidikan));
    }

    public function postCreateStep2(Request $request)
    {
      $validatedData = $request->validate([
        'pendidikan' => 'required',
        'program_studi' => 'required'
      ]);

      if(empty($request->session()->get('pendidikan'))){
          $pendidikan = new JenjangPendidikan();
          $pendidikan->fill($validatedData);
          $request->session()->put('pendidikan', $pendidikan);
      }else{
          $pendidikan = $request->session()->get('pendidikan');
          $pendidikan->fill($validatedData);
          $request->session()->put('pendidikan', $pendidikan);
      }

      return redirect('/daftar/create-step3');
    }
    
    public function createStep3(Request $request)
    {
      $santri = $request->session()->get('santri');
      return view('daftar.create-step3',compact('santri'));
    }

    public function postCreateStep3(Request $request)
    {
      $validatedData = $request->validate([
        'nama' => 'required',
        'gender' => 'required',
        'nisn' => 'required',
        'tempat_lahir' => 'required',
      ]);

      if(empty($request->session()->get('santri'))){
          $santri = new Santri();
          $santri->fill($validatedData);
          $request->session()->put('santri', $santri);
      }else{
          $santri = $request->session()->get('santri');
          $santri->fill($validatedData);
          $request->session()->put('santri', $santri);
      }

      return redirect('/daftar/create-step4');
    }

    public function createStep4(Request $request)
    {
      $wali_santri = $request->session()->get('wali_santri');
      return view('daftar.create-step4',compact('wali_santri', $wali_santri));
    }

    public function postCreateStep4(Request $request)
    {
      $validatedData = $request->validate([
        'nama_ayah' => 'required',
        'alamat' => 'required',
      ]);

      if(empty($request->session()->get('wali_santri'))){
          $wali_santri = new WaliSantri();
          $wali_santri->fill($validatedData);
          $request->session()->put('wali_santri', $wali_santri);
      }else{
          $wali_santri = $request->session()->get('wali_santri');
          $wali_santri->fill($validatedData);
          $request->session()->put('wali_santri', $wali_santri);
      }

      return redirect('/daftar/create-step5');
    }

    
    public function createStep5(Request $request)
    {
        $santri = $request->session()->get('santri');
        $wali_santri = $request->session()->get('wali_santri');
        return view('daftar.create-step5',compact('santri',$santri,'wali_santri', $wali_santri));
    }

    public function store(Request $request)
    {
        $wali_santri = $request->session()->get('wali_santri');
        $wali_santri->save();

        $user = $request->session()->get('user');
        $user->id_wali_santri = $wali_santri->id;
        $user->password = bcrypt($request->session()->get('user.password'));
        $user->type_user = 'wali santri';
        $user->save();


        $santri = $request->session()->get('santri');
        $santri->id_wali_santri = $wali_santri->id;
        $santri->tanggal_lahir = '2010-11-01';
        $santri->agama = 'Islam';
        $santri->kebutuhan_khusus = 'Tidak ada';
        $santri->asal_sekolah = 'SMP N 1 Pajarakan';
        $santri->alamat = 'Rt 5 Rw 3 Desa Pilangbango';
        $santri->no_tlp = '085000000000';
        $santri->email = $user->email;
        $santri->save();

        $pendidikan = $request->session()->get('pendidikan');
        $pendidikan->id_santri = $santri->id;
        $pendidikan->save();

        $request->session()->flush(); // delete all session

        return redirect('/');
    }

    // public function createStep3(Request $request)
    // {
    //     $santri = $request->session()->get('santri');
    //     $wali_santri = $request->session()->get('wali_santri');
    //     return view('daftar.create-step3',compact('santri',$santri,'wali_santri', $wali_santri));
    // }

    // /**
    //  * Store product
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $wali_santri = $request->session()->get('wali_santri');
    //     $wali_santri->save();
    //     $santri = $request->session()->get('santri');
    //     $santri->id_wali_santri = $wali_santri->id;
    //     $santri->save();

    //     $request->session()->flush(); // delete all session

    //     return redirect('/');
    // }

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
        //
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
