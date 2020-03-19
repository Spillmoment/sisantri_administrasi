@extends('layout.form_wizard.main')

{{-- @section('title', 'Data Kategori')
@section('header_name', 'Halaman Kategori') --}}
@section('container')
<form id="example-advanced-form" action="/daftar/create-step2" method="post">
    @csrf
    <h3>Pendidikan</h3>
    <fieldset class="form-input">
        <h4>Santri</h4>

        <label for="pendidikan" class="mt-3">Pendidikan *</label>
        <select class="form-control" name="pendidikan" onchange="showDiv('hidden_progdi', this)">
            <option {{{ (isset($pendidikan['pendidikan']) && $pendidikan['pendidikan'] == 'PP. RIYADLUS SHOLIHIN') ? "selected=\"selected\"" : "" }}}>PP. RIYADLUS SHOLIHIN</option>
            <option {{{ (isset($pendidikan['pendidikan']) && $pendidikan['pendidikan'] == 'WUSTHA RIYADLUS SHOLIHIN') ? "selected=\"selected\"" : "" }}}>WUSTHA RIYADLUS SHOLIHIN</option>
            <option {{{ (isset($pendidikan['pendidikan']) && $pendidikan['pendidikan'] == 'ULYA RIYADLUS SHOLIHIN') ? "selected=\"selected\"" : "" }}}>ULYA RIYADLUS SHOLIHIN</option>
            <option {{{ (isset($pendidikan['pendidikan']) && $pendidikan['pendidikan'] == 'ULYA PLUS RAUDLATUL MALIKIYAH') ? "selected=\"selected\"" : "" }}}>ULYA PLUS RAUDLATUL MALIKIYAH</option>
        </select>
        
        <div id="hidden_progdi">
            <label for="programStudi">Program studi</label>
            <label class="radio-inline"><input type="radio" name="program_studi" value="Teknik Komputer Jaringan" {{{ (isset($pendidikan['program_studi']) && $pendidikan['program_studi'] == 'Teknik Komputer Jaringan') ? "checked" : "" }}}> Teknik Komputer Jaringan</label>
            <label class="radio-inline"><input type="radio" name="program_studi" value="Otomotif" {{{ (isset($pendidikan['program_studi']) && $pendidikan['program_studi'] == 'Otomotif') ? "checked" : "" }}}> Otomotif</label>
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