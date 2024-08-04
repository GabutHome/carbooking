@extends('layouts.panel')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Mobil</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/carmodels/{{ $carmodel->carmodel_id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" id="brand" class="form-control @error('brand') is-invalid  @enderror"
                                name="brand" required autofocus value="{{ old('brand', $carmodel->brand) }}">
                            @error('brand')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="model" class="form-label">Jenis Mobil</label>
                            <input type="text" id="model" class="form-control @error('model') is-invalid  @enderror"
                                name="model" required value="{{ old('model', $carmodel->model) }}">
                            @error('model')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="plat_no" class="form-label">No Plat</label>
                            <input type="text" id="plat_no"
                                class="form-control @error('plat_no') is-invalid  @enderror" name="plat_no" required
                                value="{{ old('plat_no', $carmodel->plat_no) }}">
                            @error('plat_no')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="text" id="year" class="form-control @error('year') is-invalid  @enderror"
                                name="year" required value="{{ old('year', $carmodel->year) }}">
                            @error('year')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" id="type" class="form-control @error('type') is-invalid  @enderror"
                                name="type" required value="{{ old('type', $carmodel->type) }}">
                            @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            @if ($carmodel->image)
                                <img src="{{ asset('storage/' . $carmodel->image) }}"
                                    class="img-preview img-fluid mb-3 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 d-block">
                            @endif
                            <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            <input class="form-control  @error('image') is-invalid  @enderror" type="file" id="image"
                                name="image" onchange="previewImage()">
                            @error('image')
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
