@extends('layouts.sbadmin.app')

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Barang</h1>
    <a href="{{ route('barang.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Daftar Barang</a>
  </div>

  @if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
  @endif

  <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="kode_barang">Kode Barang</label>
        <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" placeholder="A119" name="kode_barang" value="{{ old('kode_barang') }}">
        @error('kode_barang')
          <span class="text text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="Sabun Lifebuoy" name="nama_barang" value="{{ old('nama_barang') }}">
        @error('nama_barang')
          <span class="text text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="Harga">Harga</label>
        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="5000" name="harga" value="{{ old('harga') }}">
        @error('harga')
          <span class="text text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label for="stok">Stok</label>
        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="100" name="stok" value="{{ old('stok') }}">
        @error('stok')
          <span class="text text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="form-group">
        <label>Gambar</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="gambar" name="gambar">
          <label class="custom-file-label" for="gambar">Pilih Gambar</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Barang</button>
  </form>

</div>
@endsection