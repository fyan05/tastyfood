@extends('user-post.template')

@section('title','Dashboard User')

@section('content')

<style>
.card-stat {
    border-radius: 16px;
    transition: .3s;
    position: relative;
    overflow: hidden;
}
.card-stat:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 30px rgba(0,0,0,.1);
}
.card-stat i {
    position: absolute;
    right: 20px;
    bottom: 20px;
    opacity: .15;
}
.bg-gradient-primary {
    background: linear-gradient(135deg, #4e73df, #224abe);
    color: #fff;
}

/* Responsive Design */
@media (max-width: 576px) {
    .card-stat {
        padding: 1.5rem !important;
    }
    .card-stat h6 {
        font-size: 0.875rem;
    }
    .card-stat h1 {
        font-size: 1.75rem;
    }
    .card-stat i {
        right: 15px;
        bottom: 15px;
        font-size: 2rem !important;
    }
}

@media (max-width: 768px) {
    .table {
        font-size: 0.875rem;
    }
    .table thead th {
        padding: 0.5rem !important;
    }
    .table tbody td {
        padding: 0.5rem !important;
    }
}
</style>

<h3 class="fw-bold mb-4">Dashboard</h3>

{{-- ====== STAT CARD ====== --}}
<div class="row g-4 mb-4">

    <div class="col-12 col-sm-6 col-md-4">
        <div class="card card-stat p-4 bg-gradient-primary border-0">
            <h6>Total Postingan</h6>
            <h1 class="fw-bold">{{ $totalPostingan }}</h1>
            <i class="fa-solid fa-newspaper fa-4x"></i>
        </div>
    </div>

</div>

{{-- ====== TABLE POSTINGAN TERBARU ====== --}}
<div class="card shadow-sm border-0">
    <div class="card-header bg-white fw-bold">
        Postingan Terbaru
    </div>
    <div class="card-body p-2 p-sm-3 p-md-4">

        <div class="table-responsive">
            <table class="table align-middle table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($latestPost as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <span class="badge bg-info">{{ $item->kategori }}</span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            Belum ada postingan
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
