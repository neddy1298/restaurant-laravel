@extends('layouts.app')

@section('content')
<div class="container-fluid mt--7">
  <!-- Table -->
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row">
            <h3 class="col-10">Data Masakan</h3>
            <button type="button" class="btn btn-icon btn-3 btn-primary" data-toggle="modal" data-target="#tambah-masakan">

              <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>
              <span class="btn-inner--text">Tambah Masakan</span>

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
                <th>Nama</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Created At</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($masakans as $masakan)
              <tr>
                <th scope="row">
                  <div class="media align-items-center">
                    <a href="#" class="mr-3">
                      <img alt="Image placeholder" src="{{ asset('assets')}}/img/masakan/{{ $masakan->gambar_masakan }}" style="width:80px; height:60px;">
                    </a>
                    <div class="media-body">
                      <span class="mb-0 text-sm">{{ $masakan->nama_masakan }}</span>
                    </div>
                  </div>
                </th>
                <td>
                  {{ $masakan->harga }}
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    <i class="bg-warning"></i> {{ $masakan->status_masakan }}
                  </span>
                </td>
                <td>
                  {{ $masakan->created_at }}
                </td>
                <td class="text-center">
                  <button type="button" class="btn btn-icon btn-3 btn-warning" data-toggle="modal" data-target="#edit-masakan-{{ $masakan->id_masakan}}">

                    <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                    <span class="btn-inner--text">Edit</span>

                  </button>
                  <button type="button" class="btn btn-icon btn-3 btn-danger" data-toggle="modal" data-target="#hapus-masakan-{{ $masakan->id_masakan }}">

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
          <nav aria-label="Masakans">
            <ul class="pagination justify-content-end mb-0">
                {{ $masakans->links("pagination::bootstrap-4") }}
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambah Masakan -->

  <div class="row">
    <div class="col-md-4">
      <div class="modal fade" id="tambah-masakan" tabindex="-1" role="dialog" aria-labelledby="tambah-masakan" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                  <div class="text-center text-muted mb-6">
                    <h2>Tambah Masakan</h2>
                  </div>
                  <form role="form" method="POST" action="masakan/tambah">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-control-label ">Nama</label>
                          <input type="text" class="form-control" id="nama_masakan" name="nama_masakan" required autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="form-control-label">Harga</label>
                          <input type="number" class="form-control" id="harga" name="harga" required autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="form-control-label">Status</label>
                          <input type="text" class="form-control" id="status_masakan" name="status_masakan" required autocomplete="off">
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

  <!-- !Tambah Masakan -->
  @foreach($masakans as $masakan)
  <!-- Edit Masakan -->

  <div class="row">
    <div class="col-md-4">
      <div class="modal fade" id="edit-masakan-{{$masakan->id_masakan}}" tabindex="-1" role="dialog" aria-labelledby="edit-masakan" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                  <div class="text-center text-muted mb-6">
                    <h2>Edit Masakan</h2>
                  </div>
                  <form role="form" method="POST" action="masakan/edit/{{$masakan->id_masakan}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">

                        <div class="file-field form-group">
                          <div class="z-depth-1-half mb-4">
                            <img id="Imageuploaded-{{ $masakan->nama_masakan}}" src="{{ asset('assets')}}/img/masakan/{{ $masakan->gambar_masakan }}" class="img-fluid" style="width:780px; height:400px;">
                          </div>
                          <div class="d-flex justify-content-center">
                            <div class="btn btn-mdb-color btn-rounded float-left">
                              <input type="file" onchange="readURL{{ $masakan->nama_masakan}}(this);" id="gambar_masakan" name="gambar_masakan" required value="{{ $masakan->gambar_masakan }}">
                            </div>
                          </div>
                        </div>


                        <script>
                          function readURL{{$masakan->nama_masakan}}(input) {
                            if (input.files && input.files[0]) {

                              var reader = new FileReader();

                              reader.onload = function(e) {
                                $('#Imageuploaded-{{ $masakan->nama_masakan}}')
                                  .attr('src', e.target.result)
                                  .width(780)
                                  .height(400);
                              };

                              reader.readAsDataURL(input.files[0]);
                            }

                          }
                        </script>

                        <div class="form-group">
                          <label class="form-control-label ">Nama</label>
                          <input type="text" class="form-control" id="nama_masakan" name="nama_masakan" required autocomplete="off" value="{{ $masakan->nama_masakan }}">
                        </div>
                        <div class="form-group">
                          <label class="form-control-label">Harga</label>
                          <input type="number" class="form-control" id="harga" name="harga" require autocomplete="off" value="{{ $masakan->harga }}">
                        </div>
                        <div class="form-group">
                          <label class="form-control-label">Status</label>
                          <input type="text" class="form-control" id="status_masakan" name="status_masakan" require autocomplete="off" value="{{ $masakan->status_masakan  }}">
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

  <!-- !Edit Masakan -->


  <!-- Hapus Masakan -->

  <div class="col-md-4">
    <div class="modal fade" id="hapus-masakan-{{$masakan->id_masakan}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
              <h4 class="heading mt-4">anda akan menghapus data masakan berikut</h4>
              <div class="table-responsive">
                <table class="table table-striped table-dark align-items-center">
                  <thead class="">
                    <tr>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Created At</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="table-light text-dark">
                      <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="rounded-circle mr-3">
                            <img alt="Image placeholder" src="{{ asset('assets')}}/img/masakan/{{ $masakan->gambar_masakan }}" style="width:80px; height:60px;">
                          </a>
                          <div class="media-body">
                            <span class="mb-0 text-sm">{{ $masakan->nama_masakan }}</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        {{ $masakan->harga }}
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-warning"></i> {{ $masakan->status_masakan }}
                        </span>
                      </td>
                      <td>
                        {{ $masakan->created_at }}
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-link text-white" data-dismiss="modal">Batal</button>
            <a class="btn btn-danger ml-auto" href="masakan/hapus/{{ $masakan->id_masakan }}">Hapus</a>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- !Hapus Masakan -->

  @endforeach
  @endsection