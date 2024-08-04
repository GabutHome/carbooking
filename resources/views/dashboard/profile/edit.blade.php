@extends('layouts.panel')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            @if (session()->has('success'))
            <div class="alert alert-success d-flex" role="alert">
                {{ session('success') }}
            </div>
             @endif
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                </div>
                <div class="card-body">
                    <form action="/dashboard/profile/{{ $user->user_id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid  @enderror"
                                name="name" required autofocus value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid  @enderror"
                                name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" id="nip" class="form-control @error('nip') is-invalid  @enderror"
                                name="nip" value="{{ old('nip', $user->nip) }}" required>
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">No. Telp</label>
                            <input type="text" id="phone_number"
                                class="form-control @error('phone_number') is-invalid  @enderror" name="phone_number"
                                value="{{ old('phone_number', $user->phone_number) }}">
                            @error('phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="picture" class="form-label">Picture</label>
                            @if ($user->image)
                                <img src="{{ asset('storage/' . $user->image) }}"
                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @endif
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
