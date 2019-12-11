@extends('layouts.app' ,['activePage' => 'Order'])

@section('content')
<div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h3 class="col-10">Data Order</h3>
                        <button type="button" class="btn btn-icon btn-3 btn-primary" data-toggle="modal"
                            data-target="#tambah-order">

                            <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>
                            <span class="btn-inner--text">Tambah Order</span>

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
                                <th>No Meja</th>
                                <th>Tanggal Order</th>
                                <th>User</th>
                                <th>Keterangan</th>
                                <th>Status Order</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                @if($no == 0)
                                <?php $no = 1;?>
                                @endif
                                <td class="text-center">{{ $no++ }}</td>
                                <td>
                                    {{ $order->no_meja }}
                                </td>
                                <td>
                                    {{ $order->tanggal }}
                                </td>
                                <td>
                                    {{ $order->name }}
                                </td>
                                <td>
                                    {{ $order->keterangan }}
                                </td>
                                <td>
                                    {{ $order->status_order }}
                                </td>
                                <td class="text-center">

                                    <a class="btn btn-icon btn-3 btn-info" href="/order/detail/{{ $order->id_order}}">
                                        <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                                        <span class="btn-inner--text">Detail Order</span>
                                    </a>

                                    <button type="button" class="btn btn-icon btn-3 btn-warning" data-toggle="modal"
                                        data-target="#edit-order-{{ $order->id_order}}">

                                        <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                                        <span class="btn-inner--text">Edit</span>

                                    </button>
                                    <button type="button" class="btn btn-icon btn-3 btn-danger" data-toggle="modal"
                                        data-target="#hapus-order-{{ $order->id_order }}">

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
                    <nav aria-label="orders">
                        <ul class="pagination justify-content-end mb-0">
                            {{ $orders->links("pagination::bootstrap-4") }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah order -->

    <div class="row">
        <div class="col-md-4">
            <div class="modal fade" id="tambah-order" tabindex="-1" role="dialog" aria-labelledby="tambah-order"
                aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card bg-secondary shadow border-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-6">
                                        <h2>Tambah order</h2>
                                    </div>
                                    <form role="form" method="POST" action="{{ route('orderTambah')}}">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label ">User</label>
                                                    <input type="text" class="form-control" id="id_user" name="id_user"
                                                        readonly autocomplete="off" value="{{ Auth::user()->id }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label ">No Meja</label>
                                                    <input type="number" class="form-control" id="no_meja"
                                                        name="no_meja" required autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label ">Tanggal</label>
                                                    <div class="input-group input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="ni ni-calendar-grid-58"></i></span>
                                                        </div>
                                                        <input class="form-control date" id="tanggal" name="tanggal"
                                                            required placeholder="Select date" type="text"
                                                            autocomplete="off" value=" {{ date('Y-m-d') }}">

                                                        <input class="form-control" required id="time" name="time"
                                                            type="time" value="now">

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label ">Keterangan</label>
                                                    <input type="text" class="form-control" id="keterangan"
                                                        name="keterangan" required autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label ">Status Order</label>
                                                    <input type="text" class="form-control" id="status_order"
                                                        name="status_order" required autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
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

    <!-- !Tambah order -->
    @foreach($orders as $order)
    <!-- Edit order -->

    <div class="row">
        <div class="col-md-4">
            <div class="modal fade" id="edit-order-{{$order->id_order}}" tabindex="-1" role="dialog"
                aria-labelledby="edit-order" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card bg-secondary shadow border-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-6">
                                        <h2>Edit order</h2>
                                    </div>
                                    <form role="form" method="POST" action="order/edit/{{$order->id_order}}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label ">User</label>
                                                    <input type="text" class="form-control" readonly autocomplete="off"
                                                        value="{{ Auth::user()->name }}">
                                                    <input type="text" class="form-control" id="id_user" name="id_user"
                                                        hidden autocomplete="off" value="{{ Auth::user()->id }}">


                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label ">No Meja</label>
                                                    <input type="number" class="form-control" id="no_meja"
                                                        name="no_meja" required autocomplete="off"
                                                        value="{{ $order->no_meja }}">
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label ">Keterangan</label>
                                                    <input type="text" class="form-control" id="keterangan"
                                                        name="keterangan" required autocomplete="off"
                                                        value="{{ $order->keterangan }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label ">Status Order</label>
                                                    <input type="text" class="form-control" id="status_order"
                                                        name="status_order" required autocomplete="off"
                                                        value="{{ $order->status_order }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
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

    <!-- !Edit order -->


    <!-- Hapus order -->

    <div class="col-md-4">
        <div class="modal fade" id="hapus-order-{{$order->id_order}}" tabindex="-1" role="dialog"
            aria-labelledby="modal-notification" aria-hidden="true">
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
                            <h4 class="heading mt-4">anda akan menghapus data order berikut</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-dark align-items-center">
                                    <thead class="">
                                        <tr>
                                            <th>No Meja</th>
                                            <th>Tanggal</th>
                                            <th>User</th>
                                            <th>Keterangan</th>
                                            <th>Status Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ $order->no_meja }}
                                            </td>
                                            <td>
                                                {{ $order->tanggal }}
                                            </td>
                                            <td>
                                                {{ $order->name }}
                                            </td>
                                            <td>
                                                {{ $order->keterangan }}
                                            </td>
                                            <td>
                                                {{ $order->status_order }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-white" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger ml-auto" href="order/hapus/{{ $order->id_order }}">Hapus</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- !Hapus order -->

    @endforeach
    @endsection