@extends('layouts.panel')
@section('title', 'Create Karyawan')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Buat Data Karyawan</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/users" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" id="nip" class="form-control @error('nip') is-invalid  @enderror"
                                name="nip" value="{{ old('nip') }}" required>
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Karyawan</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid  @enderror"
                                name="name" required autofocus value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid  @enderror"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">No. Telp</label>
                            <input type="text" id="phone_number"
                                class="form-control @error('phone_number') is-invalid  @enderror" name="phone_number"
                                value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid  @enderror" name="password">
                            @error('password')
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
