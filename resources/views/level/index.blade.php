@extends('layouts.app', ['activePage' => 'Level'])

@section('content')
<div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h3 class="col-10">Data level</h3>
                        <button type="button" class="btn btn-icon btn-3 btn-primary" data-toggle="modal"
                            data-target="#tambah-level">

                            <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>
                            <span class="btn-inner--text">Tambah level</span>

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
                                <th>Nama</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($levels as $level)
                            <tr>
                                @if($no == 0)
                                <?php $no = 1;?>
                                @endif
                                <td class="text-center">{{ $no++ }}</td>
                                <td>
                                    {{ $level->nama_level }}
                                </td>
                                <td>
                                    {{ $level->created_at }}
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-icon btn-3 btn-warning" data-toggle="modal"
                                        data-target="#edit-level-{{ $level->id_level}}">

                                        <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                                        <span class="btn-inner--text">Edit</span>

                                    </button>
                                    <button type="button" class="btn btn-icon btn-3 btn-danger" data-toggle="modal"
                                        data-target="#hapus-level-{{ $level->id_level }}">

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
                    <nav aria-label="Levels">
                        <ul class="pagination justify-content-end mb-0">
                            {{ $levels->links("pagination::bootstrap-4") }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Level -->

    <div class="row">
        <div class="col-md-4">
            <div class="modal fade" id="tambah-level" tabindex="-1" role="dialog" aria-labelledby="tambah-level"
                aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card bg-secondary shadow border-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-6">
                                        <h2>Tambah Level</h2>
                                    </div>
                                    <form role="form" method="POST" action="{{ route('levelTambah')}}">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label ">Nama</label>
                                                    <input type="text" class="form-control" id="nama_level"
                                                        name="nama_level" required autocomplete="off">
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

    <!-- !Tambah Level -->
    @foreach($levels as $level)
    <!-- Edit Level -->

    <div class="row">
        <div class="col-md-4">
            <div class="modal fade" id="edit-level-{{$level->id_level}}" tabindex="-1" role="dialog"
                aria-labelledby="edit-level" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card bg-secondary shadow border-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-6">
                                        <h2>Edit level</h2>
                                    </div>
                                    <form role="form" method="POST" action="level/edit/{{$level->id_level}}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <label class="form-control-label ">Nama</label>
                                                    <input type="text" class="form-control" id="nama_level"
                                                        name="nama_level" required autocomplete="off"
                                                        value="{{ $level->nama_level }}">
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

    <!-- !Edit Level -->


    <!-- Hapus Level -->

    <div class="col-md-4">
        <div class="modal fade" id="hapus-level-{{$level->id_level}}" tabindex="-1" role="dialog"
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
                            <h4 class="heading mt-4">anda akan menghapus data level berikut</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-dark align-items-center">
                                    <thead class="">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-light text-dark">
                                            @if($no2 == 0)
                                            <?php $no2 = 1;?>
                                            @endif
                                            <td class="text-center">
                                                {{ $no2++ }}
                                            </td>
                                            <td>
                                                {{ $level->nama_level }}
                                            </td>
                                            <td>
                                                {{ $level->created_at }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-white" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger ml-auto" href="level/hapus/{{ $level->id_level }}">Hapus</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- !Hapus level -->

    @endforeach
    @endsection