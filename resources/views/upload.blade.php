<!DOCTYPE html>
<html>
<head>
    <title>Upload File Tabungan</title>
</head>
<body>
    <h1>Upload File Tabungan</h1>
    @if ($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="tabungan_file" accept=".txt" required>
        <button type="submit">Upload</button>
    </form>
    <br>
    <form action="{{ route('read') }}" method="get" style="display:inline;">
        <button type="submit">Kembali ke Data Tabungan</button>
    </form>
</body>
</html>