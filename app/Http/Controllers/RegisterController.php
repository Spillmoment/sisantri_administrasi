<?php

namespace App\Http\Controllers;

use App\Santri;
use App\WaliSantri;
use App\Users;
use App\Wilayah;
use App\PenFormal;
use App\PenDiniah;
use App\PenJurusan;
use App\Province;
use App\Regencie;
use App\District;
use App\Village;
use App\JenjangPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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
      // $user = $request->session()->get('user');
      return view('register.create-step1');
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
        'username' => 'required|max:255|unique:user',
        'email' => 'required|email|max:255|unique:user',
        'password_hash' => 'required|min:6'
      ]);

      if(empty($request->session()->get('user'))){
          $user = new Users();
          $user->fill($validatedData);
          $request->session()->put('user', $user);
          $request->old('username');
      }else{
          $user = $request->session()->get('user');
          $user->fill($validatedData);
          $request->session()->put('user', $user);
      }

      // $user = $request->session()->get('user');
      // $user->username = $request->username;
      // $user->email = $request->email;
      // $user->password_hash = $request->password_hash;
      // $user->type_user = 'Wali Santri';
      // $user->status = 10;
      // $user->auth_key = 'NULL';

      // $user->save();

      // Success query----------------
      // $user->username = $request->username;
      // $user->email = $request->email;
      // $user->password_hash = $request->password_hash;
      // $user->type_user = 'Wali Santri';
      // $user->status = 10;
      // $user->auth_key = 'NULL';

      // $user->save();

      // return redirect('/daftar/create-step2');
      return redirect()->step1();
    }

    
    public function createStep2(Request $request)
    {
      $wali_santri = $request->session()->get('wali_santri');
      return view('register.create-step2',compact('wali_santri', $wali_santri));
    }

    public function postCreateStep2(Request $request)
    {
      $validatedData = $request->validate([
        'nama_suami' => 'required',
        'tgl_suami' => 'required',
        'pendidikan_suami' => 'required',
        'pekerjaan_suami' => 'required',
        'penghasilan_suami' => 'required',
        'nama_istri' => 'required',
        'tgl_istri' => 'required',
        'pendidikan_istri' => 'required',
        'pekerjaan_istri' => 'required',
        'penghasilan_istri' => 'required',
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

        return redirect('/daftar/create-step3');
        // return redirect('/daftar/create-file');
      }
    
    public function createStep3(Request $request)
    {
      $santri = $request->session()->get('santri');
      $wilayah = Wilayah::select('id_wilayah', 'nama_wilayah')->get();
      $pen_formal = PenFormal::select('kd_jp_formal', 'jenjang_pendidikan')->get();
      $pen_diniah = PenDiniah::select('kd_jp_diniah', 'jenjang_pendidikan')->get();
      $pen_jurusan = PenJurusan::select('kd_jurusan', 'nm_jurusan')->get();
      $province = Province::all();

      return view('register.create-step3',compact(
        'santri','wilayah','pen_formal','pen_diniah','pen_jurusan','province'
      ));
    }

    public function postCreateStep3(Request $request)
    {
      $validatedData = $request->validate([
        'nis' => 'required|numeric|unique:santri,nis',
        'nama' => 'required',
        'id_wilayah' => 'required',
        'kd_jp_formal' => 'required',
        'kd_jp_diniah' => 'required',
        'kd_jurusan' => 'required',
        'provinces_id' => 'required',
        'regencies_id' => 'required',
        'districts_id' => 'required',
        'village_id' => 'required',
        'tempat_lahir' => 'required',
        'tgl' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'email' => 'required',
        'asal_sekolah' => 'required',
        'telephone' => 'required',
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

      return redirect('/daftar/create-file');
      // return redirect('/daftar/create-step4');
      
    }

    //--------File Controller-----------------
    public function createFile(Request $request)
    {
        $santri = $request->session()->get('santri');
        return view('register.create-file',compact('santri', $santri));
    }

    
    public function postCreateFile(Request $request)
    {
        $santri = $request->session()->get('santri');
        if(!isset($santri->foto)) {
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $fileName = "santriFoto-" . time() . '.' . request()->foto->getClientOriginalExtension();
            $request->foto->move('./uploads/santri_foto/', $fileName);         
            $santri = $request->session()->get('santri');

            $santri->foto = $fileName;
            $request->session()->put('santri', $santri);
        }

        if(!isset($santri->foto_kk)) {
          $request->validate([
              'foto_kk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
          ]);

          $fileName = "santriFotoKK-" . time() . '.' . request()->foto_kk->getClientOriginalExtension();
          $request->foto_kk->move('./uploads/santri_foto_kk/', $fileName); 
          $santri = $request->session()->get('santri');

          $santri->foto_kk = $fileName;
          $request->session()->put('santri', $santri);
      }

        return redirect('/daftar/create-step4');

    }

    public function removeFoto(Request $request)
    {
        $santri = $request->session()->get('santri');
        File::delete('uploads/santri_foto/'.$santri->foto);
        $santri->foto = null;
        return view('register.create-file',compact('santri', $santri));
    }

    public function removeFotoKK(Request $request)
    {
        $santri = $request->session()->get('santri');
        File::delete('uploads/santri_foto_kk/'.$santri->foto_kk);
        $santri->foto_kk = null;
        return view('register.create-file',compact('santri', $santri));
    }

    //--------End File Controller-----------------

    public function createStep4(Request $request)
    {
        $santri = $request->session()->get('santri');
        $wali_santri = $request->session()->get('wali_santri');
        return view('register.create-step4',compact('santri',$santri,'wali_santri', $wali_santri));
    }

    public function store(Request $request)
    {
        $user = $request->session()->get('user');
        // $user->id_wali_santri = $wali_santri->id;
        // $user->username = $request->username;
        // $user->email = $request->email;
        $user->password_hash = bcrypt($request->session()->get('user.password_hash'));
        $user->type_user = 'Wali Santri';
        $user->status = 10;
        $user->auth_key = 'NULL';
        $user->save();

        $wali_santri = $request->session()->get('wali_santri');
        $santri = $request->session()->get('santri');

        $wali_santri->id_wali_santri = time();
        $wali_santri->id = $user->id;
        $wali_santri->save();

        $santri->id_wali_santri = $wali_santri->id_wali_santri;
        $santri->no_kamar = 01;
        $santri->save();

        // $pendidikan = $request->session()->get('pendidikan');
        // $pendidikan->id_santri = $santri->id;
        // $pendidikan->save();

        $request->session()->flush(); // delete all session

        return redirect('/');
    }

    public function findRegencies(Request $request){
      $data = Regencie::select('id','name')->where('province_id',$request->id)->orderBy('name', 'asc')->get();

      return response()->json($data);
    }
    
    public function findDistricts(Request $request){
      $data = District::select('id','name')->where('regency_id',$request->id)->orderBy('name', 'asc')->get();

      return response()->json($data);
    }

    public function findVillages(Request $request){
      $data = Village::select('id','name')->where('district_id',$request->id)->orderBy('name', 'asc')->get();

      return response()->json($data);
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
