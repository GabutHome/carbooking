{{-- @dd($histories) --}}
@extends('layouts.panel')
@section('title', 'List Data Pengembalian')
@section('content')
<div class="row">
    <div class="col-lg-11">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Data Pengembalian</h6>
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
                                <th>Kondisi Mobil</th>
                                <th>Status</th>
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
                                        <td class="align-midle">{{ $history->cek_kondisi }}</td>
                                        <td class="align-middle">
                                        <form action="/dashboard/history-kembali/{{ $history->id_pengembalian }}" method="post" class="d-inline">
                                            @method('put')
                                            @csrf
                                            <input type="hidden" value="1" name="is_done">
                                            <button class="badge bg-warning"
                                                onclick="return confirm('Pastikan kunci sudah diterima?')">
                                                Selesai<i class="fas fa-fw fa-car"></i>
                                            </button>
                                        </form>

                                        <!-- <form action="/dashboard/history-kembali/{{ $history->id }}" method="post"
                                            class="d-inline">
                                            @method('post')
                                            @csrf
                                    {{-- <td class="align-middle">
                                        <form action="/dashboard/history-kembali" method="post"
                                            class="d-inline">
                                            @method('post')
                                            @csrf --}}
                                            <input type="hidden" value="1" name="is_done">
                                            <button class="badge bg-warning"
                                                onclick="return confirm('Pastikan kunci sudah diterima?')">
                                                Selesai <i class="fas fa-fw fa-car"></i>
                                            </button>
                                            
                                        </form> -->
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
