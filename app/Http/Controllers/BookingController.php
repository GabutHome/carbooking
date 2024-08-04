<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\CarModel;
use App\Models\History;
use App\Models\Pengembalian;
use PDF;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.peminjaman.index', [
            // 'bookings' => Booking::all()
            'bookings' => Booking::where('user_id', auth()->user()->user_id)
                ->where('is_kembali', '=', 0)
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.peminjaman.create', [
            'carmodels' => CarModel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {

        $validatedData = $request->validate([
            'tgl_booking' => 'required',
            'tgl_kembali' => 'required',
            'carmodel_id' => 'required',
            'keterangan' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->user_id;

        Booking::create($validatedData);
        History::create($validatedData);
        Pengembalian::create($validatedData);
        return redirect('/dashboard/bookings')->with('success', 'Booking mobil berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        return view('dashboard.peminjaman.edit', [
            'booking' => $booking
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        // return $booking;
        /**
        * Mo.
        */
        // return $booking->booking_id;
        $rules = [
            'is_kembali' => 'required',
            'cek_kondisi' => 'required'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->user_id;


        Booking::where('booking_id', $booking->booking_id)
            ->update($validatedData);
        Pengembalian::where('id_pengembalian', $booking->booking_id)
            ->update($validatedData);

        // return('test');

        return redirect('/dashboard/bookings')->with('success', 'Mobil sudah dikembalikan!');
    }

    /**
     * Laporan booking pdf.
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function cetak_pdf()
    {
        $bookings = Booking::all();

        $pdf = PDF::loadview('booking_pdf', ['bookings' => $bookings]);
        return $pdf->stream('laporan-booking-pdf');
    }

    /**
     * Rejected booking.
     */
    public function rejected($id)
    {
        $rejected = Booking::where('booking_id', $id)
            ->update([
                'is_rejected' => 1,
                'updated_at' => now()
            ]);

        return redirect()->back()->with('success', 'Booking mobil telah di reject');
    }
}
