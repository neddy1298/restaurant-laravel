@extends('layouts.app',['activePage' => 'User']) @section('content')
@foreach($users as $user)

<div class="main-content">
  <!-- Header -->

  <!-- Page content -->
  <div class="container-fluid mt--7">
    <div class="row">
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <h1 class="display-2 text-white">Hello {{ $user->name }}</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img
                    src="{{
                      asset('assets')
                    }}/img/user/{{ $user->gambar_user }}"
                    class="rounded-circle"
                  />
                </a>
              </div>
            </div>
          </div>
          <div
            class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4"
          ></div>
          <div class="card-body pt-0 pt-md-4">
            <div class="row">
              <div class="col">
                <div
                  class="card-profile-stats d-flex justify-content-center mt-md-5"
                >
                  <div>
                    <span class="heading">{{ $transaksi->count() }}</span>
                    <span class="description">Transaksi sukses</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <h3>
                {{ $user->name}}
              </h3>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i
                >{{ $user->nama_level }}
              </div>
              <span class="font-weight-light">of</span>
              <div><i class="ni education_hat mr-2"></i>of Hatch & Ko</div>
              <hr class="my-4" />
              <p>
                {{ $user->name}} — Join at {{ $user->created_at}} — and now as
                {{ $user->nama_level}} at Hatch & Ko Company.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row">
              <div class="col-lg-12">
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                  {{ session("success") }}
                </div>
                @elseif(session('danger'))
                <div class="alert alert-danger" role="alert">
                  {{ session("danger") }}
                </div>
                @elseif(session('warning'))
                <div class="alert alert-warning" role="alert">
                  {{ session("warning") }}
                </div>
                @endif
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">My account</h3>
              </div>
              <div class="col-4 text-right">
                <button
                  type="submit"
                  class="btn btn-sm btn-primary"
                  onclick="fillable1()"
                >
                  Edit
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- Change User Profile -->

            <form role="form" method="POST" action="/user/edit2/{{$user->id}}">
              {{ csrf_field() }}
              <h6 class="heading-small text-muted mb-4">User Profile</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username"
                        >Username</label
                      >
                      <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control form-control-alternative"
                        placeholder="Username"
                        value="{{ $user->name
                          }}"
                        required
                        disabled="true"
                      />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email"
                        >Email address</label
                      >
                      <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control form-control-alternative"
                        value="{{ $user->email
                          }}"
                        required
                        disabled="true"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label">Jabatan</label>
                      <select
                        class="form-control"
                        id="id_level"
                        name="id_level"
                        required
                        disabled
                      >
                        <option
                          value="{{ $user->id_level }}"
                          >{{ $user->nama_level }}</option
                        >
                        @foreach($levels as $level)
                        <option value="{{ $level->id_level }}"
                          >{{$level ->nama_level}}
                        </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group col-12 text-right">
                  <button
                    type="submit"
                    id="simpan"
                    class="btn btn-outline-primary"
                    disabled="true"
                  >
                    Simpan
                  </button>
                </div>
              </div>
              <hr class="my-4" />
            </form>

            <!-- Change Password -->

            <form role="form" method="POST" action="/user/edit2/{{$user->id}}">
              {{ csrf_field() }}
              <div class="row align-items-center mb-5">
                <div class="col-8">
                  <h3 class="mb-0">Change Password</h3>
                </div>
                <div class="col-4 text-right">
                  <button
                    type="submit"
                    class="btn btn-sm btn-primary"
                    onclick="fillable2()"
                  >
                    Edit
                  </button>
                </div>
              </div>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country"
                        >Password</label
                      >
                      <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control form-control-alternative"
                        placeholder="Password"
                        required
                        disabled="true"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country"
                        >New Password</label
                      >
                      <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control form-control-alternative"
                        placeholder="new password"
                        required
                        disabled="true"
                      />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country"
                        >Confirm New Password</label
                      >
                      <input
                        type="password"
                        id="confirm_password"
                        class="form-control form-control-alternative"
                        placeholder="confirm new password"
                        required
                        disabled="true"
                      />
                    </div>
                  </div>
                  <div class="form-group col-12 text-right">
                    <button
                      type="submit"
                      id="ubah_password"
                      class="btn btn-outline-primary"
                      disabled="true"
                    >
                      Ubah Password
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2018
            <a
              href="https://www.creative-tim.com"
              class="font-weight-bold ml-1"
              target="_blank"
              >Creative Tim</a
            >
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>
<script>
  function fillable1() {
    document.getElementById("name").disabled = false;
    document.getElementById("email").disabled = false;
    document.getElementById("simpan").disabled = false;
    document.getElementById("id_level").disabled = false;
  }
  function fillable2() {
    document.getElementById("password").disabled = false;
    document.getElementById("password").disabled = false;
    document.getElementById("confirm_password").disabled = false;
    document.getElementById("ubah_password").disabled = false;
  }
  var password = document.getElementById("password"),
    confirm_password = document.getElementById("confirm_password");

  function validatePassword() {
    if (password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_password.setCustomValidity("");
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>
@endforeach @endsection
