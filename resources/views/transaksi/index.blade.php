@extends('layouts.app',['activePage' => 'Transaksi']) @section('content')

<div class="container-fluid mt--7">
  <!-- Table -->
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row">
            <h3 class="col-10">Data level</h3>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush table-hover">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Id Transaksi</th>
                <th>User</th>
                <th>Id Order</th>
                <th>Tanggal Transaksi</th>
                <th>Total Bayar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($transaksis as $transaksi)
              <tr>
                <?php $i = 1;?>
                <td class="text-center">{{ $i++ }}</td>
                <td>
                  {{ $transaksi->id_transaksi }}
                </td>
                <td>
                  {{ $transaksi->id_user }}
                </td>
                <td>
                  {{ $transaksi->id_order }}
                </td>
                <td>
                  {{ $transaksi->tanggal }}
                </td>
                <td>
                  {{ $transaksi->total_bayar }}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer py-4">
          <nav aria-label="transaksis">
            <ul class="pagination justify-content-end mb-0">
              {{ $transaksis->links("pagination::bootstrap-4") }}
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer -->

@endsection
