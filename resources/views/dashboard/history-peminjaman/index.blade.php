{{-- @dd($histories) --}}
@extends('layouts.panel')
@section('title', 'List Data Peminjaman')
@section('content')
{{-- Halaman Data Peminjaman Admin --}}

    <div class="row">
        <div class="col-lg-11">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">List Data Peminjaman</h6>
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
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>No Plat</th>
                                    <th>Tgl Booking</th>
                                    <th>Tgl Kembali</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $history)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="align-middle">
                                            @if ($history->carmodel->image)
                                                <div>
                                                    <img class="img-thumbnail" style="max-height:150px"
                                                        src="{{ asset('storage/' . $history->carmodel->image) }}"
                                                        alt="">
                                                </div>
                                            @else
                                            @endif
                                        </td>
                                        <td class="align-middle">{{ $history->user->name }}</td>
                                        <td class="align-middle">{{ $history->user->nip }}</td>
                                        <td class="align-middle">{{ $history->carmodel->plat_no }}</td>
                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::parse($history->tgl_booking)->format('Y-m-d') }}</td>
                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::parse($history->tgl_kembali)->format('Y-m-d') }}</td>

                                        {{-- @if ($history->is_approved)
                                                <label for="">Approved</label>
                                            @else
                                                <label for="">Pending</label>
                                            @endif
                                             --}}
                                        
                                        <td class="align-middle">
                                            @if(!$history->is_rejected)
                                            <form action="/dashboard/history-pinjam/{{ $history->booking_id }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" value="1" name="is_approved">
                                                <button class="badge bg-primary" onclick="return confirm('Approved?')">
                                                    Approved <i class="fas fa-fw fa-car"></i>
                                                </button>
                                            </form>
                                            
                                            <a href="/rejected/{{ $history->booking_id}}">
                                                <button class="badge bg-danger" onclick="return confirm('Yakin ingin rejected?')">
                                                Reject <i class="fas fa-fw fa-exclamation-circle"></i>
                                                </button>
                                            </a>
                                            @else
                                            <p class="badge bg-danger">Rejected!</p>
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
