<div class="container-fluid">
  <div class="header-body">
    <!-- Card stats -->
    <div class="row">
      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">
                  Transaksi
                </h5>
                <span
                  class="h2 font-weight-bold mb-0"
                  >{{ $transaksis->count() }}</span
                >
              </div>
              <div class="col-auto">
                <div
                  class="icon icon-shape bg-danger text-white rounded-circle shadow"
                >
                  <i class="fas fa-chart-bar"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
              <a class="text-info mr-2" href="{{ route('transaksi') }}"
                >Lihat</a
              >
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Order</h5>
                <span
                  class="h2 font-weight-bold mb-0"
                  >{{ $orders->count() }}</span
                >
              </div>
              <div class="col-auto">
                <div
                  class="icon icon-shape bg-warning text-white rounded-circle shadow"
                >
                  <i class="fas fa-chart-pie"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
              <a class="text-info mr-2" href="{{ route('order') }}">Lihat</a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">
                  Masakan
                </h5>
                <span
                  class="h2 font-weight-bold mb-0"
                  >{{ $masakans->count() }}</span
                >
              </div>
              <div class="col-auto">
                <div
                  class="icon icon-shape bg-yellow text-white rounded-circle shadow"
                >
                  <i class="fas fa-utensils"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
              <a class="text-info mr-2" href="{{ route('masakan') }}">Lihat</a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">User</h5>
                <span
                  class="h2 font-weight-bold mb-0"
                  >{{ $users->count() }}</span
                >
              </div>
              <div class="col-auto">
                <div
                  class="icon icon-shape bg-info text-white rounded-circle shadow"
                >
                  <i class="fas fa-users"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-muted text-sm">
              <a class="text-info mr-2" href="{{ route('user') }}">Lihat</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
