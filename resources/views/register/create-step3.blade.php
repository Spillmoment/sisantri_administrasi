@extends('layout.form_wizard.main')

{{-- @section('title', 'Data Kategori')
@section('header_name', 'Halaman Kategori') --}}
@section('container')
<form id="example-advanced-form" action="/daftar/create-step3" method="post">
    @csrf
    <h3>Account</h3>
    <fieldset class="form-input">
        <h4>Santri</h4>
        <label for="confirm">Tempat lahirrrr *</label>
        <input type="text" value="{{ session()->get('santri.tempat_lahir') }}" class="form-control required"  name="tempat_lahir">
        
        <label for="userName">Nama *</label>
        <input type="text" value="{{ session()->get('santri.nama') }}" class="form-control required"  name="nama">
        
        <label for="confirm" class="mt-3">NIS *</label>
        <input type="text"  value="{{ session()->get('santri.nis') }}" class="form-control required" name="nis"/>

        <label for="confirm" class="mt-3">Wilayah *</label>
        <select name="id_wilayah" class="form-control form-control form-control-alternative">
            @foreach ($wilayah as $item)
              <option value={{$item->id_wilayah}}>{{$item->nama_wilayah}}</option>
            @endforeach
        </select>

        <label for="confirm" class="mt-3">Pendidikan Formal</label>
        <select name="kd_jp_formal" class="form-control form-control form-control-alternative">
            @foreach ($pen_formal as $item)
              <option value="{{$item->kd_jp_formal}}" @if (isset($santri->kd_jp_formal) && $santri->kd_jp_formal == session()->get('santri.kd_jp_formal'))
                selected="selected"
              @endif>{{$item->jenjang_pendidikan}}</option>
              {{-- <option {{{ (isset($product->company) && $product->company == 'Apple') ? "selected=\"selected\"" : "" }}}>Apple</option> --}}
            @endforeach
        </select>

        <label for="confirm" class="mt-3">Pendidikan Diniah</label>
        <select name="kd_jp_diniah" class="form-control form-control form-control-alternative">
            @foreach ($pen_diniah as $item)
              <option value={{$item->kd_jp_diniah}}>{{$item->jenjang_pendidikan}}</option>
            @endforeach
        </select>

        <label for="confirm" class="mt-3">Jurusan</label>
        <select name="kd_jurusan" class="form-control form-control form-control-alternative">
            @foreach ($pen_jurusan as $item)
              <option value={{$item->kd_jurusan}}>{{$item->nm_jurusan}}</option>
            @endforeach
        </select>

        <label for="confirm" class="mt-3">Provinsi</label>
        <select name="provinces_id" class="province form-control form-control form-control-alternative">
            <option value="0" disabled="true" selected="true">-Provinsi-</option>
            @foreach ($province as $item)
              <option value={{$item->id}}>{{$item->name}}</option>
            @endforeach
        </select>

        <label for="confirm" class="mt-3">Kabupaten</label>
        <select name="regencies_id" class="regencie form-control form-control form-control-alternative">
            <option value="0" disabled="true" selected="true">-Kabupaten-</option>
        </select>

        <label for="confirm" class="mt-3">Kecamatan</label>
        <select name="districts_id" class="district form-control form-control form-control-alternative">
            <option value="0" disabled="true" selected="true">-Kecamatan-</option>
        </select>

        <label for="confirm" class="mt-3">Desa</label>
        <select name="village_id" class="village form-control form-control form-control-alternative">
            <option value="0" disabled="true" selected="true">-Desa-</option>
        </select>

        {{-- <label for="confirm" class="mt-3">Kamar</label>
        <select name="no_kamar" class="village form-control form-control form-control-alternative">
            <option value="0" disabled="true" selected="true">-Kamar-</option>
        </select> --}}

        

        <label for="confirm">Tanggal lahir *</label>
        <input type="date" value="{{ session()->get('santri.tgl') }}" class="form-control required"  name="tgl">
        
        <label for="confirm" class="mt-3">Jenis kelamin *</label><br>
        <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="L" {{{ (isset($santri['jenis_kelamin']) && $santri['jenis_kelamin'] == 'L') ? "checked" : "" }}}> Laki-laki</label>
        <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="P" {{{ (isset($santri['jenis_kelamin']) && $santri['jenis_kelamin'] == 'P') ? "checked" : "" }}}> Perempuan</label><br>
        
        <label for="tempatLahir">Alamat Lengkap*</label>
        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{ session()->get('santri.alamat') }}</textarea>

        <label for="confirm">Email </label>
        <input type="email" value="{{ session()->get('santri.email') }}" class="form-control"  name="email">

        <label for="confirm">Asal Sekolah *</label>
        <input type="text" value="{{ session()->get('santri.asal_sekolah') }}" class="form-control required"  name="asal_sekolah">

        <label for="confirm">No. Telephone</label>
        <input type="text" value="{{ session()->get('santri.telephone') }}" class="form-control required"  name="telephone">
        
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



@endsection
