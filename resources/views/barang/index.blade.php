@extends('layouts.sbadmin.app')

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Barang</h1>
    <a href="{{ route('barang.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Barang</a>
  </div>

  @if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
  @endif

  <!-- Content Row -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Edit</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tfoot class="text-center">
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Edit</th>
              <th>Hapus</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($barangs as $barang)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$barang->kode_barang}}</td>
              <td>{{$barang->nama_barang}}</td>
              <td>{{$barang->harga}}</td>
              <td>{{$barang->stok}}</td>
              <td class="text-center">
                <a href="{{ route('barang.show', $barang->id) }}/edit" class="btn btn-success btn-sm ">
                  <i class="fas fa-edit"></i>
                </a>
              </td>
              <!-- <td class="text-center"><a href="{{ route('barang.show', $barang->id) }}" class="btn btn-danger btn-sm ">Hapus</a></td> -->
              <td class="text-center">
                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@endsection