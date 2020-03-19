@extends('layout.form_wizard.main')

@section('container')
<h1>Simpan File</h1>
    <hr>
    @if(isset($santri->foto))
    Foto Santri:
    <img alt="Foto Santri" src="/uploads/santri_foto/{{$santri->foto}}" width="250px" height="auto"/>
    @endif
    @if(isset($santri->foto))
    Foto Santri:
    <img alt="Foto Santri" src="/uploads/santri_foto_kk/{{$santri->foto_kk}}" width="250px" height="auto"/>
    @endif

    <form action="/daftar/create-file" method="post" enctype="multipart/form-data">
        @csrf
        <h3>Upload File Santri</h3><br/><br/>

        <div class="form-group">
            <input type="file" {{ (!empty($santri->foto)) ? "disabled" : ''}} class="form-control-file" name="foto" id="foto" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>
        <div class="form-group">
            <input type="file" {{ (!empty($santri->foto_kk)) ? "disabled" : ''}} class="form-control-file" name="foto_kk" id="foto_kk" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>
        <button type="submit" class="btn btn-primary">Lanjut</button>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form><br/>
    
    @if(isset($santri->foto))
    <form action="/daftar/remove-foto" method="post">
        @csrf
    <button type="submit" class="btn btn-danger">Hapus Foto</button>
    </form>
    @endif

    @if(isset($santri->foto_kk))
    <form action="/daftar/remove-fotokk" method="post">
        @csrf
    <button type="submit" class="btn btn-danger">Hapus Foto KK</button>
    </form>
    @endif

@endsection