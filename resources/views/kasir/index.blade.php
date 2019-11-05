@extends('layouts.sbadmin.app')

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kasir</h1>
    <a href="{{ route('barang.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Barang</a>
  </div>

  @if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
  @endif

  <!-- Content Row -->
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" cellspacing="0">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot class="text-center">
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Action</th>
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
                    <span class="d-inline">
                      <form class="d-inline" action="{{ route('kasir.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $barang->id }}">
                        <input type="hidden" name="kode_barang" value="{{ $barang->kode_barang }}">
                        <input type="hidden" name="nama_barang" value="{{ $barang->nama_barang }}">
                        <input type="hidden" name="harga" value="{{ $barang->harga }}">
                        <input type="hidden" name="stok" value="{{ $barang->stok}}">
                        <button class="btn btn-success btn-sm">
                          Add to Cart
                        </button>
                      </form>
                    </span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      @if($cart)
        <h2 class="text-primary">Cart</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga Barang</th>
            </tr>
          </thead>
          <tbody>
            @if($cart)
              @foreach($cart as $cart)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $cart['nama_barang'] }}</td>
                  <td>{{ $cart['harga'] }}</td>
                </tr>
              @endforeach
              <tr class="font-weight-bold">
                <td colspan="2">Total</td>
                <td>{{ $harga }}</td>
              </tr>
            @else
              <!-- nothing to show -->
            @endif
          </tbody>
        </table>
        <div class="cart-action text-right">
          <form class="d-inline" action="{{ route('kasir.clear') }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Hapus Keranjang</button>
          </form>
          <a href="{{ route('kasir.print') }}" class="btn btn-primary">Print Keranjang</a>
        </div>
      @else
        <h2 class="text-info">Cart Kosong</h2>
      @endif
    </div>
  </div>
</div>
@endsection