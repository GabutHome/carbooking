@extends('layouts.panel')
@section('title', 'History Peminjaman')
@section('content')
    <div class="container-fluid mb-5">
        <div class="card shadow mb-4 col-lg-8">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Mobil</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    @if ($carmodel->image)
                        <img class="img-thumbnail" src="{{ asset('storage/' . $carmodel->image) }}" alt="">
                    @else
                    @endif
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Brand</label>
                    <input type="text" id="name" class="form-control" name="brand" required disabled
                        value="{{ $carmodel->brand }}">
                </div>




                <div class="mb-3">
                    <label for="name" class="form-label">Model</label>
                    <input type="text" id="name" class="form-control" name="brand" required disabled
                        value="{{ $carmodel->model }}">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Year</label>
                    <input type="text" id="name" class="form-control" name="brand" required disabled
                        value="{{ $carmodel->year }}">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Type Mobil</label>
                    <input type="text" id="name" class="form-control" name="brand" required disabled
                        value="{{ $carmodel->type }}">
                </div>

                <div class="mb-3">
                    <a href="/dashboard/carmodels/{{ $carmodel->carmodel_id }}/edit" class="btn btn-success float-right mt-2"><i class="fas fa-fw fa-edit"></i> Edit</a>
                </div>

            </div>
        </div>
    </div>
@endsection
