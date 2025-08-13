<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TabunganController extends Controller
{
    protected $filePath = 'tabungan.txt';

    // Baca file dan parsing ke array
    private function readFile()
    {   
        \Log::info('Storage path: ' . Storage::path($this->filePath));
        if (!Storage::exists($this->filePath)) {
            return ['error' => 'File tidak ditemukan.'];
        }

        $content = Storage::get($this->filePath);
        $lines = explode("\n", trim($content));
        $data = [];

        foreach ($lines as $index => $line) {
            $data[] = str_getcsv($line, '|'); // Pipe sebagai delimiter
        }

        return $data;
    }

    // URL: /read
    public function read()
    {
        $data = $this->readFile();
        if (isset($data['error'])) {
            return view('read', ['error' => $data['error']]);
        }

        $header = $data[0];
        $rows = array_slice($data, 1);

        return view('read', compact('header', 'rows'));
    }

    // URL: /edit (tampilkan form edit)
    public function edit()
    {
        $data = $this->readFile();
        if (isset($data['error'])) {
            return view('edit', ['error' => $data['error']]);
        }

        $header = $data[0];
        $rows = array_slice($data, 1);

        return view('edit', compact('header', 'rows'));
    }

    // Simpan perubahan ke file
    public function save(Request $request)
    {
        $header = $request->input('header');
        $rows = $request->input('rows');

        $lines = [];
        $lines[] = implode('|', $header);

        foreach ($rows as $row) {
            $lines[] = implode('|', $row);
        }

        $content = implode("\n", $lines);
        Storage::put($this->filePath, $content);

        return redirect()->route('edit')->with('success', 'Data berhasil disimpan!');
    }
}