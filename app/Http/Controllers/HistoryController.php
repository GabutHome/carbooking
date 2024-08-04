<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

    /**
     * Approved booking mobil di admin.
     */
    public function index()
    {
        return view('dashboard.history-peminjaman.index', [
            'histories' => Booking::where('is_approved', '=', 0)
                ->get()
        ]);
    }

    public function update(Request $request, History $history_pinjam)
    {
        //return ('Mobil sudah kembali!');
        $rules = [
            'is_approved' => 'required'
        ];
        
        $validatedData = $request->validate($rules);
        // return $history_pinjam;
    
        History::where('id', $history_pinjam->id)
            ->update($validatedData);
        Booking::where('booking_id', $history_pinjam->id)
            ->update($validatedData);


        return redirect('/dashboard/history-pinjam')->with('success', 'Booking Mobil telah disetujui!');
    }

}

