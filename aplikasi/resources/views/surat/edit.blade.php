@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Arsip Surat >> Unggah</h1>
    </div>
    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan</p>
    <p>Catatan</p>
    <ul>
        <li>Gunakan file berformat pdf</li>
    </ul>

    <form action="{{ route('surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" name="nomor_surat"
                    value="{{ $surat->nomor_surat }}">
                @error('nomor_surat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="id_kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <select class="form-control" @error('id_kategori') is-invalid @enderror id="id_kategori" name="id_kategori">
                    @foreach ($kategori as $k)
                        @if ($k->id == $surat->id_kategori)
                            <option value="{{ $k->id }}" selected>{{ $k->nama }}</option>
                        @endif
                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                    @endforeach
                </select>
                @error('id_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                    value="{{ $surat->judul }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="file_surat" class="col-sm-2 col-form-label">File Surat (PDF)</label>
            <div class="col-sm-10">
                <input type="file" class="form-control @error('file_surat') is-invalid @enderror" id="file_surat" name="file_surat">
                <input type="hidden" class="form-control @error('file_surat') is-invalid @enderror" id="file_surat" name="old_file_surat">
                @error('file_surat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <a href="{{ route('surat.index') }}" class="btn btn-primary"><< Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>

</div>
@endsection
