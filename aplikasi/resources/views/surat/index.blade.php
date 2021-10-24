@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Arsip Surat</h1>
    </div>
    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan</p>
    <p class="mb-4">Klik lihat pada kolom aksi untuk menampilkan surat</p>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <span class="alert-icon"><i class="bi bi-exclamation-circle-fill"></i></span>
            <span class="alert-text"><strong>{{ session('success') }}</strong></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form method="GET" action="{{ route('surat.index') }}">
        @csrf

        <div class="form-group row">
            <label for="keyword" class="col-sm-2 col-form-label">Cari Surat:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="keyword" name="keyword">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Cari</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Waktu Pengarsipan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surat as $s)
                    <tr>
                        <td>{{ $s->nomor_surat }}</td>
                        <td>{{ $s->kategori->nama }}</td>
                        <td>{{ $s->judul }}</td>
                        <td>{{ $s->created_at }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#deleteModal-{{ $s->id }}">Hapus</i></a>
                            <a href="{{ asset('file') . '/' . $s->file_surat }}" class="btn btn-sm btn-warning">Unduh</a>
                            <a href="{{ route('surat.show', $s->id) }}" class="btn btn-sm btn-primary">Lihat >></a>

                            <div class="modal fade" id="deleteModal-{{ $s->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Apakah anda yakin ingin menghapus arsip surat ini?</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <a class="btn btn-primary" href="#" onclick="event.preventDefault();
                                document.getElementById('delete-s-form-{{ $s->id }}').submit();">Ya</a>
                                            <form id="delete-s-form-{{ $s->id }}"
                                                action="{{ route('surat.destroy', $s->id) }}"
                                                method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('surat.create') }}" class="btn btn-primary mb-2">Arsipkan Surat</a>

</div>
@endsection
