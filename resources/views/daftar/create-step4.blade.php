@extends('layout.form_wizard.main')

{{-- @section('title', 'Data Kategori')
@section('header_name', 'Halaman Kategori') --}}
@section('container')
<form id="example-advanced-form" action="/daftar/create-step4" method="post">
    @csrf
    <h3>Account</h3>
    <fieldset class="form-input">
        <h4>Data Orang Tua</h4>

        <label for="title">Nama ayah</label>
        <input type="text" value="{{ session()->get('wali_santri.nama_ayah') }}" class="form-control" id="namaOrtu"  name="nama_ayah">
        
        <label for="title">Alamat</label>
        <input type="text" value="{{ session()->get('wali_santri.alamat') }}" class="form-control" id="alamatOrtu"  name="alamat">

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