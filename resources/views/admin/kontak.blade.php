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
        <table class="table table-hover align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Pesan</th>
                    <th>Status</th>
                    <th>Dikirim</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $k)
                <tr class="{{ $k->status == 'belum terbaca' ? 'table-warning' : '' }}">
                    <td class="fw-bold">{{ $loop->iteration }}</td>

                    <td>{{ $k->nama }}</td>

                    <td>
                        <a href="mailto:{{ $k->email }}">
                            {{ $k->email }}
                        </a>
                    </td>

                    <td class="fw-semibold">{{ $k->subject }}</td>

                    <td>
                        {{ Str::limit($k->pesan, 40) }}
                    </td>

                    <td>
                        @if ($k->status == 'belum terbaca')
                            <span class="badge bg-warning text-dark">
                                Belum Terbaca
                            </span>
                        @else
                            <span class="badge bg-success">
                                Terbaca
                            </span>
                        @endif
                    </td>

                    <td>
                        <div class="d-flex flex-column">
                            <span>{{ $k->created_at->format('d M Y') }}</span>
                            <small class="text-muted">{{ $k->created_at->format('H:i') }}</small>
                        </div>
                    </td>

                    {{-- AKSI --}}
                    <td>
                        <button class="btn btn-sm btn-outline-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $k->id }}">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </td>
                </tr>

                {{-- ================= MODAL DETAIL PESAN ================= --}}
                <div class="modal fade" id="detailModal{{ $k->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title">
                                    <i class="fa-solid fa-envelope-open-text me-2"></i>
                                    Detail Pesan
                                </h5>
                                <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body text-start">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Nama</strong>
                                        <p>{{ $k->nama }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Email</strong>
                                        <p>
                                            <a href="mailto:{{ $k->email }}">
                                                {{ $k->email }}
                                            </a>
                                        </p>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <strong>Subject</strong>
                                    <p>{{ $k->subject }}</p>
                                </div>

                                <div class="mb-3">
                                    <strong>Pesan Lengkap</strong>
                                    <div class="border rounded p-3 bg-light">
                                        {{ $k->pesan }}
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <strong>Status</strong><br>
                                    @if ($k->status == 'belum terbaca')
                                        <span class="badge bg-warning text-dark">
                                            Belum Terbaca
                                        </span>
                                    @else
                                        <span class="badge bg-success">
                                            Terbaca
                                        </span>
                                    @endif
                                </div>

                                <div>
                                    <strong>Dikirim</strong><br>
                                    {{ $k->created_at->format('d M Y H:i') }}
                                </div>
                            </div>

                            <div class="modal-footer">
                                @if ($k->status == 'belum terbaca')
                                <form action="{{ route('admin.kontak.read', $k->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-secondary"
                                        data-bs-dismiss="modal">
                                    Tutup
                                </button>
                                </form>
                                @endif


                            </div>

                        </div>
                    </div>
                </div>
                {{-- ================= END MODAL ================= --}}
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
