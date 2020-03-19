@extends('layout.form_wizard.main')

{{-- @section('title', 'Data Kategori')
@section('header_name', 'Halaman Kategori') --}}
@section('container')
<form id="example-advanced-form" action="/daftar/create-step3" method="post">
    @csrf
    <h3>Account</h3>
    <fieldset class="form-input">
        <h4>Santri</h4>

        <label for="userName">Nama *</label>
        <input type="text" value="{{ session()->get('santri.nama') }}" class="form-control required"  name="nama">
        
        <label for="password" class="mt-3">Gender *</label>
        <select class="form-control" name="gender">
            <option {{{ (isset($santri['gender']) && $santri['gender'] == 'Laki-laki') ? "selected=\"selected\"" : "" }}}>Laki-laki</option>
            <option {{{ (isset($santri['gender']) && $santri['gender'] == 'Perempuan') ? "selected=\"selected\"" : "" }}}>Perempuan</option>
        </select>
        
        <label for="confirm" class="mt-3">NISN *</label>
        <input type="text"  value="{{ session()->get('santri.nisn') }}" class="form-control required" name="nisn"/>
        
        <label for="confirm" class="mt-3">Tempat lahir *</label>
        <input type="text"  value="{{ session()->get('santri.tempat_lahir') }}" class="form-control" id="santriTempatLahir" name="tempat_lahir"/>

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

    {{-- <form action="/daftar/create-step1" method="post">
        {{ csrf_field() }}
        {{-- <input type="hidden" name="id_wali_santri" value="1"> --}}
        {{-- <div class="form-group">
            <label for="title">Santri</label>
            <input type="text" value="{{ session()->get('santri.nama') }}" class="form-control" id="santriNama"  name="nama">
        </div>
        <div class="form-group">
            <label for="description">Gender</label>
            <select class="form-control" name="gender">
                <option {{{ (isset($santri['gender']) && $santri['gender'] == 'Laki-laki') ? "selected=\"selected\"" : "" }}}>Laki-laki</option>
                <option {{{ (isset($santri['gender']) && $santri['gender'] == 'Perempuan') ? "selected=\"selected\"" : "" }}}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">NISN</label>
            <input type="text"  value="{{ session()->get('santri.nisn') }}" class="form-control" id="santriAmount" name="nisn"/>
        </div>
        <div class="form-group">
            <label for="description">Tempat lahir</label>
            <input type="text"  value="{{ session()->get('santri.tempat_lahir') }}" class="form-control" id="santriTempatLahir" name="tempat_lahir"/>
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
    </form>  --}}

@endsection