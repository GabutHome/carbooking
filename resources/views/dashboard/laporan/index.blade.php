{{-- @dd($bookings) --}}
@extends('layouts.panel')
@section('title', 'Laporan')
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">List Laporan Booking</h6>
                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success d-flex" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body">
                    @if (Auth::user()->is_admin == 1)
                    <a href="/dashboard/bookings/cetak_pdf" type="button" class="btn btn-info mb-3 float-right">Print Laporan
                        <i class="fas fa-fw fa-print"></i></a>
                    <div class="table-responsive">
                    @endif
                    
                        
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>No plat</th>
                                    <th>Jenis Mobil</th>
                                    <th>Tgl Booking</th>
                                    <th>Tgl Kembali</th>
                                    <th>Status Pinjam</th>
                                    <th>Status Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $booking->user->name }}</td>
                                        <td class="align-middle">{{ $booking->user->nip }}</td>
                                        <td class="align-middle">{{ $booking->carmodel->plat_no }}</td>
                                        <td class="align-middle">{{ $booking->carmodel->model }}</td>
                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::parse($booking->tgl_booking)->format('Y-m-d') }}</td>
                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::parse($booking->tgl_kembali)->format('Y-m-d') }}</td>
                                            <td class="align-middle">
                                                @if ($booking->is_approved)
                                                    <label for="">Approved</label>
                                                @elseif($booking->is_rejected)
                                                    <label for="">Rejected</label>
                                                @else
                                                    <label for="">Pending</label>
                                                @endif
                                            </td>
                                        <td class="align-middle">
                                        @if ($booking->is_kembali)
                                                    <label for="">Sudah Kembali</label>
                                                @else
                                                    <label for="">Belum Kembali</label>
                                                @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
