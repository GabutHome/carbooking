@extends('layouts.panel')
@section('title','dashboard')
@section('content')
<div class="container-fluid mb-5">
    <h3>Profile</h3>
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-body">
                    <center class="mt-4 mb-4">
                        <img src="/img/{{ Auth::user()->picture }}" class="img-fluid rounded-circle" width="150">
                    </center>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Nip</th>
                                <td>{{ Auth::user()->nip }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>{{ Auth::user()->phone_number }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <form action="/admin/profile" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                            @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->nip }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Telepon</label>
                            <input type="text" class="form-control" name="phone_number" value="{{ Auth::user()->phone_number }}">
                            @error('phone_number')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label for="picture">Foto</label>
                            <input type="file" class="form-control" name="picture">
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection