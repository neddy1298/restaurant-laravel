<div class="container-fluid mt--7">
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
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>null</td>
                                    <td>null</td>
                                    <td>null</td>
                                    <td>null</td>
                                    <td>null</td>
                                    <td>null</td>
                                    <td>null</td>
                                    <td class="text-center"></td>
                                </tr>
                            </tbody>
                    </table>
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
                                                <input type="text" class="form-control" id="id_order" name="id_order" readonly autocomplete="off" value="{{$id_order}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label ">No Meja</label>
                                                    <input type="number" class="form-control" id="no_meja" name="no_meja" readonly autocomplete="off" value="{{$no_meja->no_meja}}">
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