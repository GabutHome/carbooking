<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardCarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.carmodel.index', [
            'carmodels' => CarModel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.carmodel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required|max:8',
            'model' => 'required|max:12',
            'plat_no' => 'required|max:10',
            'year' => 'required',
            'type' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('car-images');
        }

        CarModel::create($validatedData);

        return redirect('/dashboard/carmodels')->with('success', 'Mobil Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     * 
     */
    public function show(CarModel $carmodel)
    {
        return view(
            'dashboard.carmodel.show',
            [
                'carmodel' => $carmodel
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarModel $carmodel)
    {
        return view('dashboard.carmodel.edit', [
            'carmodel' => $carmodel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarModel $carmodel)
    {
        $rules = [
            'brand' => 'required',
            'model' => 'required',
            'plat_no' => 'required',
            'year' => 'required',
            'type' => 'required',
            'image' => 'image|file|max:1024'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('car-images');
        }

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        CarModel::where('carmodel_id', $carmodel->carmodel_id)
            ->update($validatedData);

        return redirect('/dashboard/carmodels')->with('success', 'Mobil berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarModel $carmodel)
    {
        CarModel::destroy($carmodel->carmodel_id);
        return redirect('/dashboard/carmodels')->with('success', 'Mobil Berhasil Dihapus!!');
    }
}
