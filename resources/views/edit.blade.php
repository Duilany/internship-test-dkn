<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Tabungan</title>
</head>
<body>
    <h1>Edit Data Tabungan</h1>

    @if(isset($error))
        <p style="color: red;">{{ $error }}</p>
    @else
        <form action="{{ route('save') }}" method="POST">
            @csrf
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        @foreach($header as $col)
                            <th>{{ $col }}</th>
                            <input type="hidden" name="header[]" value="{{ $col }}">
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $rowIndex => $row)
                        <tr>
                            @foreach($row as $cellIndex => $cell)
                                <td>
                                    <input type="text" name="rows[{{ $rowIndex }}][]" value="{{ $cell }}" required>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br>
            <button type="submit">Simpan</button>
        </form>
    @endif

    <br>
    <a href="{{ route('read') }}">Lihat Data</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
</body>
</html>