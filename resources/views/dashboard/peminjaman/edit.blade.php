@extends('layouts.panel')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Kondisi Mobil</h6>
                </div>
                <div class="card-body">
                <form method="post" action="/dashboard/bookings/{{ $booking->booking_id }}">
                @method('put')
                        @csrf
                        <input type="hidden" value="1" name="is_kembali">
                        <input type="hidden" vaue="Mobil sudah kembali" name="status_kembali">

                        <div class="mb-3">
                            <label for="cek_kondisi" class="form-label">Komentar</label>
                            <textarea type="text" id="cek_kondisi" class="form-control"
                                name="cek_kondisi" required autofocus ">
                            </textarea>
                                    
                            
                        </div>

                        <button type="submit" class="btn btn-primary float-right mt-2">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
