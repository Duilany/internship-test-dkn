<!DOCTYPE html>
<html>
<head>
    <title>Baca Data Tabungan</title>
</head>
<body>
    <h1>Data Tabungan</h1>

    @if(isset($error))
        <p style="color: red;">{{ $error }}</p>
    @endif

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

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

    <br>
    <form action="{{ route('edit') }}" method="get" style="display:inline;">
        <button type="submit">Edit Data</button>
    </form>
    <form action="{{ route('upload.form') }}" method="get" style="display:inline;">
        <button type="submit">Upload File Tabungan</button>
    </form>
    <form action="{{ route('download.file') }}" method="get" style="display:inline;">
        <button type="submit">Download File Tabungan</button>
    </form>
</body>
</html>