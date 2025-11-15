@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Database Pekerja</h3>
                <div class="card-tools">
                    <a href="{{ route('pekerja.create') }}" class="btn btn-primary btn-sm">Tambah Pekerja</a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Kontak</th>
                            <th>Skill Utama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($daftar_pekerja->count() > 0)
                            @foreach ($daftar_pekerja as $pekerja)
                                <tr>
                                    <td>{{ $loop->iteration + $daftar_pekerja->firstItem() - 1 }}</td>
                                    <td>{{ $pekerja->nama }}</td>
                                    <td>{{ $pekerja->umur }}</td>
                                    <td>{{ $pekerja->nomor_hp }}</td>
                                    <td>{{ Str::limit($pekerja->skill, 50) }}</td>
                                    <td>
                                        <a href="{{ route('pekerja.edit', $pekerja->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('pekerja.destroy', $pekerja->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data pekerja ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data pekerja.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $daftar_pekerja->links() }}
            </div>
        </div>
    </div>
</div>
@endsection