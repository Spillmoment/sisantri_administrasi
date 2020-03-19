@extends('layout.form_wizard.main')

{{-- @section('title', 'Data Kategori')
@section('header_name', 'Halaman Kategori') --}}
@section('container')
<form id="example-advanced-form" action="/daftar/create-step2" method="post">
    @csrf
    <h3>Wali</h3>
    <fieldset class="form-input">
        <h4>Santri</h4>

        <label for="ayah">nama ayah *</label>
        <input type="text" value="{{ session()->get('wali_santri.nama_suami') }}" class="form-control required"  name="nama_suami">
        
        <label for="tglAyah" class="mt-3">Tanggal lahir</label>
        <input type="date" value="{{ session()->get('wali_santri.tgl_suami') }}" class="form-control required"  name="tgl_suami">

        <label for="pendidikanAyah" class="mt-3">Pendidikan terakhir</label>
        <input type="text" value="{{ session()->get('wali_santri.pendidikan_suami') }}" class="form-control required"  name="pendidikan_suami">
        
        <label for="pekerjaanAyah" class="mt-3">Pekerjaan </label>
        <input type="text" value="{{ session()->get('wali_santri.pekerjaan_suami') }}" class="form-control required"  name="pekerjaan_suami">

        <label for="penghasilanAyah" class="mt-3">Penghasilan</label>
        <input type="number" value="{{ session()->get('wali_santri.penghasilan_suami') }}" class="form-control required"  name="penghasilan_suami">

{{-- ibu form --}}
        <label for="ibu" class="mt-3">nama ibu *</label>
        <input type="text" value="{{ session()->get('wali_santri.nama_istri') }}" class="form-control required"  name="nama_istri">

        <label for="tglIbu" class="mt-3">Tanggal lahir</label>
        <input type="date" value="{{ session()->get('wali_santri.tgl_istri') }}" class="form-control required"  name="tgl_istri">

        <label for="pendidikanIbu" class="mt-3">Pendidikan terakhir</label>
        <input type="text" value="{{ session()->get('wali_santri.pendidikan_istri') }}" class="form-control required"  name="pendidikan_istri">
        
        <label for="pekerjaanIbu" class="mt-3">Pekerjaan </label>
        <input type="text" value="{{ session()->get('wali_santri.pekerjaan_istri') }}" class="form-control required"  name="pekerjaan_istri">

        <label for="penghasilanIbu" class="mt-3">Penghasilan</label>
        <input type="number" value="{{ session()->get('wali_santri.penghasilan_istri') }}" class="form-control required"  name="penghasilan_istri">

        

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Next</button>
    </fieldset>

</form>	

    {{-- <h1>Daftar - Step 2</h1>
    <hr>
    <form action="/daftar/create-step2" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Nama ayah</label>
            <input type="text" value="{{ session()->get('wali_santri.nama_ayah') }}" class="form-control" id="namaOrtu"  name="nama_ayah">
        </div>
        <div class="form-group">
            <label for="title">Alamat</label>
            <input type="text" value="{{ session()->get('wali_santri.alamat') }}" class="form-control" id="alamatOrtu"  name="alamat">
        </div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Next</button>
    </form> --}}
@endsection

<script>
    function showDiv(divId, element)
    {
        document.getElementById(divId).style.display = element.value == 'ULYA PLUS RAUDLATUL MALIKIYAH' ? 'block' : 'none';
    }
</script>