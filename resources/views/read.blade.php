<!DOCTYPE html>
<html>
<head>
    <title>Baca Data Tabungan</title>
</head>
<body>
    <h1>Data Tabungan</h1>

    @if(isset($error))
        <p style="color: red;">{{ $error }}</p>
    @else
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    @foreach($header as $col)
                        <th>{{ $col }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                    <tr>
                        @foreach($row as $cell)
                            <td>{{ $cell }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
    <a href="{{ route('edit') }}">Edit Data</a>
</body>
</html>