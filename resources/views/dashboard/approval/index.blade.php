{{-- @dd($bookings) --}}
@extends('layouts.panel')
@section('title', 'Peminjaman')
@section('content')
    <div class="container-fluid mb-5">
        <div class="card shadow mb-4 col-lg-11">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Halaman Approval Peminjaman</h6>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success d-flex" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Image</th>
                                <th>No Plat</th>
                                <th>NIP Peminjam</th>
                                <th>Peminjam</th>
                                <th>Tgl Booking</th>
                                <th>Tgl Kembali</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="align-middle">
                                        @if ($booking->carmodel->image)
                                            <div>
                                                <img class="img-thumbnail" style="max-height:150px"
                                                    src="{{ asset('storage/' . $booking->carmodel->image) }}"
                                                    alt="">
                                            </div>
                                        @else
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $booking->carmodel->plat_no }}</td>
                                    <td class="align-middle">{{ $booking->user->nip }}</td>
                                    <td class="align-middle">{{ $booking->user->name }}</td>
                                    <td class="align-middle">
                                        {{ \Carbon\Carbon::parse($booking->tgl_booking)->format('Y-m-d') }}</td>
                                    <td class="align-middle">
                                        {{ \Carbon\Carbon::parse($booking->tgl_kembali)->format('Y-m-d') }}</td>
                                    <td class="align-middle">
                                        @if ($booking->is_approved)
                                            <label for="">Approved</label>
                                        @else
                                            <label for="">Pending</label>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <button href="#" class="badge bg-primary">
                                            Approve<i class="fas fa-fw fa-car"></i>
                                        </button>
                                        <button href="#" class="badge bg-danger">
                                            Tolak<i class="fas fa-fw fa-car"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
