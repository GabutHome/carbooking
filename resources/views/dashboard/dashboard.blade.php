@extends('layouts.panel')
@section('title', 'dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if(Auth::user()->is_admin === 1)
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h2 class="m-0 font-weight-bold text-primary">Anda Login Sebagai Admin!</h2>
                </div>
            </div>
            @else
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tata Cara Booking</h6>
                </div>
                <div class="card-body">
                    1. Klik menu Booking Mobil pada menu di sebelah kiri <p></p>
                    2. isi Form Booking Mobil dan lengkapi semua kolom <p></p>
                    3. Cek kembali apakah data yang anda input sudah sesuai<p></p>
                    4. Klik Submit jika data yang anda input telah sesuai<p></p>
                    5. Permohonan peminjaman akan sampai ke notifikasi Admin<p></p>
                    6. Cek status peminjaman, apabila status peminjaman rejected anda dapat melakukan reschedule peminjaman<p></p>
                    7. Jika anda telah selesai menggunakan mobil, anda dapat klik "Kembalikan Mobil" pada menu status peminjaman
                    8. Anda dapat memilih menu Historyjika anda ingin melihat history peminjaman terdahulu <p></p>
                    9. Logout jika anda telah selesai menggunakan aplikasi
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
