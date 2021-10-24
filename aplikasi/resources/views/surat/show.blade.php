@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Arsip Surat >> Lihat</h1>
    </div>
    <p>Nomor: {{ $surat->nomor_surat }}</p>
    <p>Kategori: {{ $surat->kategori->nama }}</p>
    <p>Judul: {{ $surat->judul }}</p>
    <p class="mb-4">Waktu Unggah: {{ $surat->created_at }}</p>

    <object data="{{ asset('file') . '/' . $surat->file_surat }}" width="100%" height="500px"></object>

    <a href="{{ route('surat.index') }}" class="btn btn-primary mb-2"><< Kembali</a>
    <a href="{{ asset('file') . '/' . $surat->file_surat }}" class="btn btn-primary mb-2">Unduh</a>
    <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-primary mb-2">Edit/Ganti File</a>

</div>
@endsection
