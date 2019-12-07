@extends('layouts.app')

@section('content')
<div class="container-fluid mt--7">
  <!-- Table -->
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row">
            <h3 class="col-10">Data user</h3>
            <button type="button" class="btn btn-icon btn-3 btn-primary" data-toggle="modal" data-target="#tambah-user">

              <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>
              <span class="btn-inner--text">Tambah user</span>

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
                <th>Email</th>
                <th>Jabatan</th>
                <th>Created At</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <th scope="row">
                  <div class="media align-items-center">
                    <a href="#" class="mr-3">
                      <img alt="Image placeholder" src="{{ asset('assets')}}/img/user/{{ $user->gambar_user }}" style="width:80px; height:60px;">
                    </a>
                    <div class="media-body">
                      <span class="mb-0 text-sm">{{ $user->name }}</span>
                    </div>
                  </div>
                </th>
                <td>
                  {{ $user->email }}
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    @if($user->id_level == 1)
                    <i class="bg-info"></i> {{ $user->nama_level }}
                    @elseif($user->id_level == 2)
                    <i class="bg-primary"></i> {{ $user->nama_level }}
                    @elseif($user->id_level == 3)
                    <i class="bg-success"></i> {{ $user->nama_level }}
                    @elseif($user->id_level == 4)
                    <i class="bg-warning"></i> {{ $user->nama_level }}
                    @endif
                  </span>
                </td>
                <td>
                  {{ $user->created_at }}
                </td>
                <td class="text-center">
                  <button type="button" class="btn btn-icon btn-3 btn-warning" data-toggle="modal" data-target="#edit-user-{{ $user->id}}">

                    <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                    <span class="btn-inner--text">Edit</span>

                  </button>
                  <button type="button" class="btn btn-icon btn-3 btn-danger" data-toggle="modal" data-target="#hapus-user-{{ $user->id }}">

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
          <nav aria-label="Users">
            <ul class="pagination justify-content-end mb-0">
                {{ $users->links("pagination::bootstrap-4") }}
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambah user -->

  <div class="row">
    <div class="col-md-4">
      <div class="modal fade" id="tambah-user" tabindex="-1" role="dialog" aria-labelledby="tambah-user" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                  <div class="text-center text-muted mb-6">
                    <h2>Tambah user</h2>
                  </div>
                  <form role="form" method="POST" action="user/tambah">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-control-label ">Nama</label>
                          <input type="text" class="form-control" id="name" name="name" required autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="form-control-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" require autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label class="form-control-label">Jabatan</label>
                          <input type="text" class="form-control" id="id_level" name="id_level" require autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" require autocomplete="off">
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

  <!-- !Tambah user -->
  @foreach($users as $user)
  <!-- Edit user -->

  <div class="row">
    <div class="col-md-4">
      <div class="modal fade" id="edit-user-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-user" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                  <div class="text-center text-muted mb-6">
                    <h2>Edit user</h2>
                  </div>
                  <form role="form" method="POST" action="user/edit/{{$user->id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">

                        <div class="file-field form-group">
                          <div class="z-depth-1-half mb-4">
                            <img id="Imageuploaded-{{ $user->name}}" src="{{ asset('assets')}}/img/user/{{ $user->gambar_user }}" class="img-fluid" style="width:780px; height:400px;">
                          </div>
                          <div class="d-flex justify-content-center">
                            <div class="btn btn-mdb-color btn-rounded float-left">
                              <input type="file" onchange="readURL{{ $user->name}}(this);" id="gambar_user" name="gambar_user" required value="{{ $user->gambar_user }}">
                            </div>
                          </div>
                        </div>


                        <script>
                          function readURL{{$user->name}}(input) {
                            if (input.files && input.files[0]) {

                              var reader = new FileReader();

                              reader.onload = function(e) {
                                $('#Imageuploaded-{{ $user->name}}')
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
                          <input type="text" class="form-control" id="name" name="name" required autocomplete="off" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                          <label class="form-control-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" require autocomplete="off" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                          <label class="form-control-label">Jabatan</label>
                          <input type="text" class="form-control" id="id_level" name="id_level" require autocomplete="off" value="{{ $user->nama_level  }}">
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

  <!-- !Edit user -->


  <!-- Hapus user -->

  <div class="col-md-4">
    <div class="modal fade" id="hapus-user-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
              <h4 class="heading mt-4">anda akan menghapus data user berikut</h4>
              <div class="table-responsive">
                <table class="table table-striped table-dark align-items-center">
                  <thead class="">
                    <tr>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jabatan</th>
                      <th>Created At</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="table-light text-dark">
                      <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="rounded-circle mr-3">
                            <img alt="Image placeholder" src="{{ asset('assets')}}/img/user/{{ $user->gambar_user }}" style="width:80px; height:60px;">
                          </a>
                          <div class="media-body">
                            <span class="mb-0 text-sm">{{ $user->name }}</span>
                          </div>
                        </div>
                      </th>
                      <td>
                        {{ $user->email }}
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4">
                          @if($user->id_level == 1)
                          <i class="bg-info"></i> {{ $user->nama_level }}
                          @elseif($user->id_level == 2)
                          <i class="bg-primary"></i> {{ $user->nama_level }}
                          @elseif($user->id_level == 3)
                          <i class="bg-success"></i> {{ $user->nama_level }}
                          @elseif($user->id_level == 4)
                          <i class="bg-warning"></i> {{ $user->nama_level }}
                          @endif
                        </span>
                      </td>
                      <td>
                        {{ $user->created_at }}
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-link text-white" data-dismiss="modal">Batal</button>
            <a class="btn btn-danger ml-auto" href="user/hapus/{{ $user->id }}">Hapus</a>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- !Hapus user -->

  @endforeach
  @endsection