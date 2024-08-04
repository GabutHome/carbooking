<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kendaraan.index', [
            'vehicles' => Vehicle::all()
        ]);
        //return view('dashboard.kendaraan.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_plat' => 'required|max:10',
            'nama_kendaraan' => 'required',
            'jenis_kendaraan' => 'required'
        ]);


        // if ($request->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // }

        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Vehicle::create($validatedData);

        return redirect('/dashboard/kendaraan')->with('success', 'New Post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return $request;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        //@dd($vehicle);
        Vehicle::destroy($vehicle->id);

        return redirect('/dashboard/kendaraan')->with('success', 'Kendaraan berhasil dihapus!');
    }
}
