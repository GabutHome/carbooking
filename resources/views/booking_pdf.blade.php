<!DOCTYPE html>
<html>

<head>
    <title>Car Booking Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Car Booking Report</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>No Plat</th>
                <th>Jenis Mobil</th>
                <th>Tgl Booking</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $booking->user->name }}</td>
                    <td class="align-middle">{{ $booking->user->nip }}</td>
                    <td class="align-middle">{{ $booking->carmodel->plat_no }}</td>
                    <td class="align-middle">{{ $booking->carmodel->model }}</td>
                    <td class="align-middle">
                        {{ \Carbon\Carbon::parse($booking->tgl_booking)->format('Y-m-d') }}</td>
                    <td class="align-middle">
                        {{ \Carbon\Carbon::parse($booking->tgl_kembali)->format('Y-m-d') }}</td>
                        <td class="align-middle">
                            @if ($booking->is_approved)
                                <label for="">Approved</label>
                            @elseif($booking->is_rejected)
                                <label for="">Rejected</label>
                            @else
                                <label for="">Pending</label>
                            @endif
                        </td>

                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
