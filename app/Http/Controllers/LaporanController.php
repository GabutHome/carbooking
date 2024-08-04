<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class LaporanController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin === 1) {
            return view('dashboard.laporan.index', [
                'bookings' => Booking::all()
            ]);
        } else {
            return view('dashboard.laporan.index', [
                'bookings' => Booking::where('user_id', auth()->user()->user_id)->get()
            ]);
        }
    }
}
