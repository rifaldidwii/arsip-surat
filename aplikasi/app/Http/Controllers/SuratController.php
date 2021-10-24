<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSuratRequest;
use App\Models\Kategori;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $surat = Surat::with('kategori')->get();

        if ($request->has('keyword')) {
            $surat = Surat::with('kategori')
                ->where('nomor_surat', 'LIKE', "%$request->keyword%")
                ->orWhere('judul', 'LIKE', "%$request->keyword%")->get();
        }

        return view('surat.index', compact('surat'));
    }

    public function create()
    {
        $kategori = Kategori::all();

        return view('surat.create', compact('kategori'));
    }

    public function store(CreateSuratRequest $request)
    {
        $file_surat = time() . rand(1, 1000) . '.pdf';
        $request->file_surat->move(public_path('/file'), $file_surat);

        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'file_surat' => $file_surat
        ]);

        return redirect()->route('surat.index')->with('success', 'Data berhasil disimpan');
    }

    public function show($id)
    {
        $surat = Surat::findOrFail($id);

        return view('surat.show', compact('surat'));
    }

    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);

        $file_surat = public_path('file\\') . $surat->file_surat;
        unlink($file_surat);

        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Data berhasil dihapus');
    }
}
