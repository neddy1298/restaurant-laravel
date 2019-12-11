@extends('layouts.app',['activePage' => 'Dashboard'])
@section('header')
<!-- Header -->
@include('layouts.navbars.header')
<!-- Header -->
@endsection
@section('content')
<div class="container-fluid mt--7">
    <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Orders</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('order') }}" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No Meja</th>
                                <th scope="col">Tanggal Order</th>
                                <th scope="col">User</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Status Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
                            </tr>
                            @endforeach
                            </tr>
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
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Masakan</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('masakan')}}" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($masakans as $masakan)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <a href="#" class="mr-3">
                                            <img alt="Image placeholder"
                                                src="{{ asset('assets')}}/img/masakan/{{ $masakan->gambar_masakan }}"
                                                style="width:80px; height:60px;">
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->

    @endsection