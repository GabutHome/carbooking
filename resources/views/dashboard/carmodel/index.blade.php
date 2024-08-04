{{-- @dd($carmodel) --}}
@extends('layouts.panel')
@section('title', 'Data Mobil')
@section('content')

    <div class="row">
        <div class="col-lg-11">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mobil</h6>
                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success d-flex" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body">

                    <a href='/dashboard/carmodels/create' class="btn btn-primary mb-2 float-right d-block"><i
                            class="fas fa-fw fa-plus"></i> Tambah Mobil</a>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Brand</th>
                                    <th>Jenis Mobil</th>
                                    <th>No Plat</th>
                                    <th>Year</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carmodels as $carmodel)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="align-middle">
                                            @if ($carmodel->image)
                                                <div>
                                                    <img class="img-thumbnail" style="max-height:150px"
                                                        src="{{ asset('storage/' . $carmodel->image) }}" alt="">
                                                </div>
                                            @else
                                            @endif
                                        </td>
                                        <td class="align-middle">{{ $carmodel->brand }}</td>
                                        <td class="align-middle">{{ $carmodel->model }}</td>
                                        <td class="align-middle">{{ $carmodel->plat_no }}</td>
                                        <td class="align-middle">{{ $carmodel->year }}</td>
                                        <td class="align-middle">{{ $carmodel->type }}</td>
                                        <td class="align-middle">
                                            <a href="/dashboard/carmodels/{{ $carmodel->carmodel_id }}" class="badge bg-info">
                                                Show <i class="fas fa-fw fa-eye"></i>
                                            </a>
                                            <a href="/dashboard/carmodels/{{ $carmodel->carmodel_id }}/edit"
                                                class="badge bg-warning">
                                                Edit <i class="fas fa-fw fa-edit"></i>
                                            </a>
                                            <form action="/dashboard/carmodels/{{ $carmodel->carmodel_id }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="badge bg-danger border-0"
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



@endsection
