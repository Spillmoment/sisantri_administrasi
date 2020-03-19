<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;
use App\Santri;
use App\User;
use App\WaliSantri;
use App\Wilayah;
use App\PenFormal;
use App\PenDiniah;
use App\PenJurusan;

use PDF;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        $wilayah = Wilayah::all();
        $penFormal = PenFormal::all();
        $penDiniah = PenDiniah::all();
        $penJurusan = PenJurusan::all();
        $wali_santri = WaliSantri::where('id',$user->id)->get();
        foreach ($wali_santri as $item) {
            $santri = Santri::where('id_wali_santri',$item->id_wali_santri)->get();   
            foreach ($santri as $san) {
                $santriWilayah = Wilayah::where('id_wilayah',$san->id_wilayah)->get();
            }
            foreach ($santri as $san) {
                $santriPenFormal = PenFormal::where('kd_jp_formal',$san->kd_jp_formal)->get();
            }
            foreach ($santri as $san) {
                $santriPenDiniah = PenDiniah::where('kd_jp_diniah',$san->kd_jp_diniah)->get();
            }
            foreach ($santri as $san) {
                $santriPenJurusan = PenJurusan::where('kd_jurusan',$san->kd_jurusan)->get();
            }
        }
        

        return view('data.index', compact('user','wali_santri','santri','wilayah','santriWilayah','penFormal','santriPenFormal','penDiniah','santriPenDiniah','penJurusan','santriPenJurusan'));
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
    public function update(Request $request, $id_wali_santri)
    {
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|email|max:255',
        //     'username' => 'required|max:100',
        //     'password' => 'sometimes|nullable|min:6'
        // ]);
        
        
        Santri::where('id_wali_santri', $id_wali_santri)
          ->update([
              'id_wilayah' => $request->id_wilayah,
              'kd_jp_formal' => $request->kd_jp_formal,
              'kd_jp_diniah' => $request->kd_jp_diniah,
              'kd_jurusan' => $request->kd_jurusan,
              'nama' => $request->nama,
              'tempat_lahir' => $request->tempat_lahir,
              'tgl' => $request->tgl,
              'jenis_kelamin' => $request->jenis_kelamin,
              'alamat' => $request->alamat,
              'email' => $request->email,
              'asal_sekolah' => $request->asal_sekolah,
              'telephone' => $request->telephone,

          ]);

        return redirect()->route('santri.index')->with('status','Data Berhasil Diubah');
    }

    // public function update_kk(Request $request, $id_wali_santri){
    //     $request->validate([
    //         'foto_kk' => 'required|image|mimes:jpeg,png,jpg|max:2048',            
    //      ],[
    //          'foto_kk.required' => 'File masih kosong !',
    //          'foto_kk.image' => 'File bertipe (jpg ata png) !',
    //          'foto_kk.max' => 'File maximum 2Mb !',
    //        ]
    //     );

    //     $santri = Santri::where('id_wali_santri', $id_wali_santri)->get();
    //     foreach ($santri as $item) {
    //         File::delete('uploads/santri_foto_kk/'.$item->foto_kk);
    //     }

    //     $fileName = null;        
    //     if ($request->hasFile('foto_kk')) {
            
    //         $file = $request->file('foto_kk');
    //         $extension = $file->getClientOriginalExtension();
    //         $fileName = "santriFotoKK-".time(). "." .$extension;
    //         $file->move('./uploads/santri_foto_kk/', $fileName); 
            
    //         // $santri->foto_kk = $fileName;
    //     }
    //     Santri::where('id_wali_santri', $id_wali_santri)
    //       ->update(['foto_kk' => $fileName]);

    //     return redirect()->route('santri.index')->with('status','Data Berhasil Diubah');
    // }

    public function indexFile()
    {
        $user = Auth::user();
        
        $wilayah = Wilayah::all();
        $penFormal = PenFormal::all();
        $penDiniah = PenDiniah::all();
        $penJurusan = PenJurusan::all();
        $wali_santri = WaliSantri::where('id',$user->id)->get();
        foreach ($wali_santri as $item) {
            $santri = Santri::where('id_wali_santri',$item->id_wali_santri)->get();   
            foreach ($santri as $san) {
                $santriWilayah = Wilayah::where('id_wilayah',$san->id_wilayah)->get();
            }
            foreach ($santri as $san) {
                $santriPenFormal = PenFormal::where('kd_jp_formal',$san->kd_jp_formal)->get();
            }
            foreach ($santri as $san) {
                $santriPenDiniah = PenDiniah::where('kd_jp_diniah',$san->kd_jp_diniah)->get();
            }
            foreach ($santri as $san) {
                $santriPenJurusan = PenJurusan::where('kd_jurusan',$san->kd_jurusan)->get();
            }
        }
        

        return view('data.data_foto', compact('user','wali_santri','santri','wilayah','santriWilayah','penFormal','santriPenFormal','penDiniah','santriPenDiniah','penJurusan','santriPenJurusan'));
    }

    public function update_photo(Request $request, $id_wali_santri){
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',            
         ],[
             'foto.required' => 'File masih kosong !',
             'foto.image' => 'File harus bertipe (jpg ata png) !',
             'foto.max' => 'File maximum 2Mb !',
           ]
        );

        $santri = Santri::where('id_wali_santri', $id_wali_santri)->get();
        foreach ($santri as $item) {
            File::delete('uploads/santri_foto/'.$item->foto);
        }

        $fileName = null;        
        if ($request->hasFile('foto')) {
            
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $fileName = "santriFoto-".time(). "." .$extension;
            $file->move('./uploads/santri_foto/', $fileName); 
            
            // $santri->foto = $fileName;
        }
        Santri::where('id_wali_santri', $id_wali_santri)
          ->update(['foto' => $fileName]);

        return redirect()->route('file.index')->with('status','Data Berhasil Diubah');
    }

    public function cetak_pdf()
    {
        $user = Auth::user();
        
        $wilayah = Wilayah::all();
        $penFormal = PenFormal::all();
        $penDiniah = PenDiniah::all();
        $penJurusan = PenJurusan::all();
        $wali_santri = WaliSantri::where('id',$user->id)->get();
        foreach ($wali_santri as $item) {
            $santri = Santri::where('id_wali_santri',$item->id_wali_santri)->get();   
            foreach ($santri as $san) {
                $santriWilayah = Wilayah::where('id_wilayah',$san->id_wilayah)->get();
            }
            foreach ($santri as $san) {
                $santriPenFormal = PenFormal::where('kd_jp_formal',$san->kd_jp_formal)->get();
            }
            foreach ($santri as $san) {
                $santriPenDiniah = PenDiniah::where('kd_jp_diniah',$san->kd_jp_diniah)->get();
            }
            foreach ($santri as $san) {
                $santriPenJurusan = PenJurusan::where('kd_jurusan',$san->kd_jurusan)->get();
            }
        }

    	// $pegawai = Pegawai::all();
 
    	$pdf = PDF::loadview('data.formulir_pdf',['santri'=>$santri, 'santriWilayah'=>$santriWilayah, 'santriPenFormal'=>$santriPenFormal, 'santriPenDiniah'=>$santriPenDiniah, 'santriPenJurusan'=>$santriPenJurusan]);
        return $pdf->download('formulir-pendaftaran-pdf');
        // return view('data.data_foto', compact('user','wali_santri','santri','wilayah','santriWilayah','penFormal','santriPenFormal','penDiniah','santriPenDiniah','penJurusan','santriPenJurusan'));
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
