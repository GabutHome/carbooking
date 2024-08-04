<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Booking;
use App\Models\Pengembalian;

class HistoryKembaliController extends Controller
{
    /**
     * Selesai kembalikan mobil di admin.
     */
    public function index()
    {
        
        return view('dashboard.history-pengembalian.index', [
            'histories' => Pengembalian::whereRaw('is_kembali > ? AND is_done < ?', [0, 1])
            ->get()
        ]);
        
    }


    public function update(Request $request, History $history_kembali)
    {
        // return ('Mobil sudah kembali!');

        $rules = [
            'is_done' => 'required'
        ];

        $validatedData = $request->validate($rules);
        //  return $history_kembali->id;


        History::where('id', $history_kembali->id)
            ->update($validatedData);
        Pengembalian::where('id_pengembalian', $history_kembali->id)
            ->update($validatedData);

        return redirect('/dashboard/history-kembali')->with('success', 'Kembalikan Mobil telah disetujui!');
    }
}
