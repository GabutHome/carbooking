{{-- @dd($vehicles) --}}
@extends('layouts.panel')
@section('title', 'Data Karyawan')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
                    </div>

                    @if (session()->has('success'))
                        <div class="alert alert-success d-flex" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <a href='/dashboard/users/create' class="btn btn-primary mb-2 float-right"><i
                                class="fas fa-fw fa-plus"></i> Tambah
                            Karyawan</a>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Karywan</th>
                                        <th>Email</th>
                                        <th>NIP</th>
                                        <th>Nomor Telp.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->nip }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>
                                                <a href="/dashboard/users/{{ $user->user_id }}/edit"
                                                    class="badge bg-warning">Edit <i class="fas fa-fw fa-edit"></i></a>
                                                <form action="/dashboard/users/{{ $user->user_id }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="badge bg-danger"
                                                        onclick="return confirm('Are you sure?')">Hapus
                                                        <i class="fas fa-fw fa-trash"></i></button>
                                                </form>
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
    </div>

@endsection
