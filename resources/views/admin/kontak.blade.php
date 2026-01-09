@extends('admin.template')

@section('content')

<div class="card shadow-sm">
    {{-- HEADER --}}
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fa-solid fa-envelope me-2"></i> Pesan Kontak Masuk
        </h5>
        <span class="badge bg-light text-dark">
            Total: {{ $data->count() }}
        </span>
    </div>

    {{-- BODY --}}
    <div class="card-body table-responsive">
        <table id="kontakTable"
               class="table table-hover align-middle text-center nowrap"
               style="width:100%">

            {{-- TABLE HEAD --}}
            <thead class="table-light">
                <tr>
                    <th style="width:50px">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Pesan</th>
                    <th style="width:130px">Status</th>
                    <th style="width:140px">Dikirim</th>
                    <th style="width:90px">Aksi</th>
                </tr>
            </thead>

            {{-- TABLE BODY --}}
            <tbody>
                @foreach ($data as $k)
                    <tr class="{{ $k->status == 'belum terbaca' ? 'table-warning' : '' }}">

                        <td class="fw-bold">
                            {{ $loop->iteration }}
                        </td>

                        <td>{{ $k->nama }}</td>

                        <td>
                            <a href="mailto:{{ $k->email }}"
                               class="text-decoration-none">
                                {{ $k->email }}
                            </a>
                        </td>

                        <td class="fw-semibold">
                            {{ $k->subject }}
                        </td>

                        <td>
                            <span data-bs-toggle="tooltip"
                                  title="{{ $k->pesan }}">
                                {{ Str::limit($k->pesan, 50) }}
                            </span>
                        </td>

                        <td>
                            @if ($k->status == 'belum terbaca')
                                <span class="badge rounded-pill bg-warning text-dark px-3 py-2">
                                    <i class="fa-solid fa-envelope me-1"></i> Belum
                                </span>
                            @else
                                <span class="badge rounded-pill bg-success px-3 py-2">
                                    <i class="fa-solid fa-check me-1"></i> Terbaca
                                </span>
                            @endif
                        </td>

                        <td>
                            <div class="d-flex flex-column align-items-center">
                                <span>{{ $k->created_at->format('d M Y') }}</span>
                                <small class="text-muted">
                                    {{ $k->created_at->format('H:i') }}
                                </small>
                            </div>
                        </td>

                        <td>
                            <div class="d-flex justify-content-center">
                                @if ($k->status == 'belum terbaca')
                                    <form action="{{ route('admin.kontak.read', $k->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-outline-primary"
                                                data-bs-toggle="tooltip"
                                                title="Tandai Terbaca">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

{{-- TOOLTIP --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    )
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
})
</script>

@endsection
