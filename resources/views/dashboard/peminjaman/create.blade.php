@extends('layouts.panel')
@section('title', 'Booking Mobil')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Booking Mobil</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/bookings" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="tgl_booking" class="form-label">Tanggal Peminjaman</label>
                            <div class="datepicker date input-group">
                                <input type="text" placeholder="Choose Date"
                                    class="form-control @error(' ') is-invalid  @enderror" id="tgl_booking"
                                    name="tgl_booking">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                @error('tgl_booking')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                            <div class="datepicker date input-group">
                                <input type="text" placeholder="Choose Date"
                                    class="form-control @error('tgl_kembali') is-invalid  @enderror" id="tgl_kembali"
                                    name="tgl_kembali">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                @error('tgl_kembali')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Pilih Mobil</label>
                            <select class="custom-select" name="carmodel_id">
                                @foreach ($carmodels as $carmodel)
                                    @if (old('carmodel') == $carmodel->carmodel_id)
                                        <option value="{{ $carmodel->carmodel_id }}" selected>
                                            {{ $carmodel->plat_no }} | {{ $carmodel->model }}</option>
                                    @else
                                        <option value="{{ $carmodel->carmodel_id }}">
                                            {{ $carmodel->model }} | {{ $carmodel->plat_no }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan Pinjam</label>
                            <textarea class="form-control @error('keterangan') is-invalid  @enderror" id="keterangan" name="keterangan"
                                rows="3"></textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary float-right mt-2">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
