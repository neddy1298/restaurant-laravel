
<div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bdetail_order-0">
                    <div class="row">
                        <h3 class="col-10">Data Detail Order</h3>
                        <button type="button" class="btn btn-icon btn-3 btn-primary" data-toggle="modal" data-target="#tambah-detail_order">

                            <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>
                            <span class="btn-inner--text">Tambah Detail Order</span>

                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                    @elseif(session('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{session('danger')}}
                    </div>
                    @elseif(session('warning'))
                    <div class="alert alert-warning" role="alert">
                        {{session('warning')}}
                    </div>
                    @endif
                    <table class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th>Id Order</th>
                                <th>No Meja</th>
                                <th>Tanggal Order</th>
                                <th>User</th>
                                <th>Menu</th>
                                <th>Keterangan</th>
                                <th>Status Order</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail_orders as $detail_order)
                            <tr>
                                @if($no == 0)
                                <?php $no = 1;?>
                                @endif
                                <td class="text-center">{{ $no++ }}</td>
                                <td>
                                    {{ $detail_order->id_order }}
                                </td>
                                <td>
                                    {{ $detail_order->no_meja }}
                                </td>
                                <td>
                                    {{ $detail_order->tanggal }}
                                </td>
                                <td>
                                    {{ $detail_order->name }}
                                </td>
                                <td>
                                    {{ $detail_order->nama_masakan }}
                                </td>
                                <td>
                                    {{ $detail_order->keterangan }}
                                </td>
                                <td>
                                    {{ $detail_order->status_detail_order }}
                                </td>
                                <td class="text-center">

                                    <button type="button" class="btn btn-icon btn-3 btn-warning" data-toggle="modal" data-target="#edit-detail_order-{{ $detail_order->id_detail_order}}">

                                        <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                                        <span class="btn-inner--text">Edit</span>

                                    </button>
                                    <button type="button" class="btn btn-icon btn-3 btn-danger" data-toggle="modal" data-target="#hapus-detail_order-{{ $detail_order->id_detail_order }}">

                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                        <span class="btn-inner--text">Hapus</span>

                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                  <nav aria-label="detail_orders">
                    <ul class="pagination justify-content-end mb-0">
                        {{ $detail_orders->links("pagination::bootstrap-4") }}
                    </ul>
                  </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Detail Order -->

    <div class="row">
        <div class="col-md-4">
            <div class="modal fade" id="tambah-detail_order" tabindex="-1" role="dialog" aria-labelledby="tambah-detail_order" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card bg-secondary shadow bdetail_order-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-6">
                                        <h2>Tambah Detail Order</h2>
                                    </div>
                                <form role="form" method="POST" action="{{ $id_order }}/tambah">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <div class="form-group">
                                                <label class="form-control-label ">ID User</label>
                                                <input type="text" class="form-control" id="id_user" name="id_user" readonly autocomplete="off" value="{{$detail_order->id_user}}">
                                                </div> --}}
                                                <div class="form-group">
                                                <label class="form-control-label ">ID Order</label>
                                                <input type="text" class="form-control" id="id_order" name="id_order" readonly autocomplete="off" value="{{$detail_order->id_order}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label ">No Meja</label>
                                                    <input type="number" class="form-control" id="no_meja" name="no_meja" readonly autocomplete="off" value="{{$detail_order->no_meja}}">
                                                </div>
                                                <div class="form-group">
                                                        <label class="form-control-label">Menu</label>
                                                        <select class="form-control" id="id_masakan" name="id_masakan" required>
                                                            <option></option>
                                                          @foreach($masakans as $masakan)
                                                            <option value="{{ $masakan->id_masakan }}">{{$masakan ->nama_masakan}}</option>
                                                          @endforeach
                                                        </select>
                                                      </div>
                                                <div class="form-group">
                                                    <label class="form-control-label ">Keterangan</label>
                                                    <input type="text" class="form-control" id="keterangan" name="keterangan" required autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label ">Status detail Order</label>
                                                    <input type="text" class="form-control" id="status_detail_order" name="status_detail_order" required autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- !Tambah detail_order -->
    @foreach($detail_orders as $detail_order)
    <!-- Edit detail_order -->

    <div class="row">
        <div class="col-md-4">
            <div class="modal fade" id="edit-detail_order-{{$detail_order->id_detail_order}}" tabindex="-1" role="dialog" aria-labelledby="edit-detail_order" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card bg-secondary shadow bdetail_order-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-6">
                                        <h2>Edit Detail Order</h2>
                                    </div>
                                    <form role="form" method="POST" action="{{$id_order}}/edit/{{$detail_order->id_detail_order}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label ">ID Order</label>
                                                    <input type="text" class="form-control" id="id_order" name="id_order" readonly autocomplete="off" value="{{$id_order}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label ">No Meja</label>
                                                        <input type="number" class="form-control" id="no_meja" name="no_meja" readonly autocomplete="off" value="{{$no_meja->no_meja}}">
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="form-control-label">Menu</label>
                                                            <select class="form-control" id="id_masakan" name="id_masakan" required>
                                                                <option value="{{ $detail_order->id_masakan }}">{{ $masakan->nama_masakan }}</option>
                                                              @foreach($masakans as $masakan)
                                                                <option value="{{ $masakan->id_masakan }}">{{$masakan ->nama_masakan}}</option>
                                                              @endforeach
                                                            </select>
                                                          </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label ">Keterangan</label>
                                                    <input type="text" class="form-control" id="keterangan" name="keterangan" required autocomplete="off" value="{{ $detail_order->keterangan }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label ">Status detail Order</label>
                                                        <input type="text" class="form-control" id="status_detail_order" name="status_detail_order" required autocomplete="off" value="{{ $detail_order->status_detail_order }}">
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- !Edit detail_order -->


    <!-- Hapus detail_order -->

    <div class="col-md-4">
        <div class="modal fade" id="hapus-detail_order-{{$detail_order->id_detail_order}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">

                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Perhatian</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">anda akan menghapus data detail order berikut</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-dark align-items-center">
                                    <thead class="">
                                        <tr>
                                            <th>Id Order</th>
                                            <th>No Meja</th>
                                            <th>Tanggal Order</th>
                                            <th>User</th>
                                            <th>Menu</th>
                                            <th>Keterangan</th>
                                            <th>Status Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                    {{ $detail_order->id_order }}
                                                </td>
                                                <td>
                                                    {{ $detail_order->no_meja }}
                                                </td>
                                                <td>
                                                    {{ $detail_order->tanggal }}
                                                </td>
                                                <td>
                                                    {{ $detail_order->name }}
                                                </td>
                                                <td>
                                                    {{ $detail_order->nama_masakan }}
                                                </td>
                                                <td>
                                                    {{ $detail_order->keterangan }}
                                                </td>
                                                <td>
                                                    {{ $detail_order->status_detail_order }}
                                                </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-white" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger ml-auto" href="/order/detail/{{$id_order}}/hapus/{{ $detail_order->id_detail_order }}">Hapus</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- !Hapus detail_order -->

    @endforeach