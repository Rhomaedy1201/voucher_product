@extends('layouts.app')
@section('title', 'Pengampu')
@section('title2', 'Pengampu')
@section('titlePage', 'Home')

@section('content')
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Table Data Pengampu</h6>
                    <a href="{{ route('pengampu.create') }}" class="btn btn-primary mb-1">Tambah</a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success mx-3">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger mx-3">{{ session('error') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Dosen</th>
                                <th>NIP</th>
                                <th>Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @forelse($pengampu as $pgmp)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pgmp->dosen->nama }}</td>
                                    <td>{{ $pgmp->nip }}</td>
                                    <td>{{ $pgmp->matakuliah->nama_mk }}</td>
                                    <td>{{ $pgmp->matakuliah->sks }} SKS</td>
                                    <td>{{ $pgmp->matakuliah->semester }}</td>
                                    <td>
                                        <a href="{{ route('pengampu.edit', $pgmp->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('pengampu.destroy', $pgmp->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data pengampu.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('extraScript')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
@endpush
