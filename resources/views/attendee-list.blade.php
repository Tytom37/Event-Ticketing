<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendee PDF</title>
</head>
<body>
    <h1>Attendee List</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Event</th>
                <th>Venue</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendees as $attend)
            <tr>
                <td>{{ $attend->fullname }}</td>
                <td>{{ $attend->contact_number }}</td>
                <td>{{ $attend->email }}</td>
                <td>{{ $attend->schedule->name }}</td>
                <td>{{ $attend->schedule->venue }}</td>
                <td><img src="data:image/png;base64,{{ base64_encode(QrCode::size(90)->generate($attend->id)) }}" alt="QR Code"></td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>