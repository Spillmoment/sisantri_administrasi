@extends('layout.form_wizard.main')

{{-- @section('title', 'Data Kategori')
@section('header_name', 'Halaman Kategori') --}}
@section('container')
<form id="example-advanced-form" action="/daftar/store" method="post">
    @csrf
    <h3>Review</h3>
    <fieldset class="form-input">
        <table class="table">
            <tr>
                <td>Product Name:</td>
                <td><strong>{{$santri['nama']}}</strong></td>
            </tr>
            <tr>
                <td>santri</td>
                <td><strong>{{$santri['nis']}}</strong></td>
            </tr>
            <tr>
                <td>Nama Ayah</td>
                <td><strong>{{$wali_santri['nama_suami']}}</strong></td>
            </tr>
            <tr>
                <td>Nama Ibu</td>
                <td><strong>{{$wali_santri['nama_istri']}}</strong></td>
            </tr>
            <tr>
                <td>Foto Santri:</td>
                <td><strong><img alt="Foto Santri" src="/uploads/santri_foto/{{$santri->foto}}"/></strong></td>
            </tr>
        </table>
    </fieldset>
    <a type="button" href="/daftar/create-step1" class="btn btn-warning">Back to Step 1</a>
    <a type="button" href="/daftar/create-step2" class="btn btn-warning">Back to Step 2</a>
    <button type="submit" class="btn btn-primary">Create</button>
</form>	

    
@endsection
{{-- <h1>Add New Product - Step 3</h1>
    <hr>
    <h3>Review Product Details</h3>
    <form action="/daftar/store" method="post" >
        {{ csrf_field() }}
        <table class="table">
            <tr>
                <td>Product Name:</td>
                <td><strong>{{$santri['nama']}}</strong></td>
            </tr>
            <tr>
                <td>santri gender</td>
                <td><strong>{{$santri['gender']}}</strong></td>
            </tr>
            <tr>
                <td>santri</td>
                <td><strong>{{$santri['nisn']}}</strong></td>
            </tr>
            <tr>
                <td>tempat lahir</td>
                <td><strong>{{$santri['tempat_lahir']}}</strong></td>
            </tr>
            <tr>
                <td>Nama Ayah</td>
                <td><strong>{{$wali_santri['nama_ayah']}}</strong></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><strong>{{$wali_santri['alamat']}}</strong></td>
            </tr>
        </table>
        <a type="button" href="/daftar/create-step1" class="btn btn-warning">Back to Step 1</a>
        <a type="button" href="/daftar/create-step2" class="btn btn-warning">Back to Step 2</a>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form> --}}