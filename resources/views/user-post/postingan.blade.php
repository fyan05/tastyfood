@extends('user-post.template')

@section('title','Kelola Postingan')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Kelola Postingan</h3>
    <a href="#" class="btn btn-primary">
        <i class="fa-solid fa-plus me-1"></i> Tambah Postingan
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Belajar Laravel 11</td>
                    <td><span class="badge bg-success">Publish</span></td>
                    <td>13 Jan 2026</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>Tips Bootstrap Modern</td>
                    <td><span class="badge bg-secondary">Draft</span></td>
                    <td>10 Jan 2026</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

@endsection
