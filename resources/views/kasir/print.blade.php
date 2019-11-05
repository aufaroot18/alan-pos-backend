<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Print Cart</title>
  <link rel="stylesheet" href="sbadmin/css/sb-admin-2.css">
</head>
<body>
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
  @else
    <h2 class="text-info">Cart Kosong</h2>
  @endif
</body>
</html>