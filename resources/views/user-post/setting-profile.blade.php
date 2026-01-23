@extends('user-post.template')
@section('title','Setting Profile')

@section('content')

<div class="container py-4">

    <!-- HEADER -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Profile Saya</h3>
        <button class="btn btn-primary mt-2 mt-md-0" data-bs-toggle="modal" data-bs-target="#modalEditProfile">
            <i class="fa-solid fa-pen me-1"></i> Edit Profile
        </button>
    </div>

    <!-- CARD PROFILE -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="row align-items-center">

                <!-- FOTO PROFILE -->
                <div class="col-12 col-md-4 text-center mb-3 mb-md-0">
                    @if($profile && $profile->image_path)
                        <img src="{{ asset('storage/postImages/'.$profile->profile_picture) }}"
                             class="rounded-circle shadow img-fluid"
                             width="160" height="160"
                             style="object-fit:cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D6EFD&color=fff"
                             class="rounded-circle shadow img-fluid"
                             width="160" height="160">
                    @endif
                </div>

                <!-- DATA PROFILE -->
                <div class="col-12 col-md-8">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th width="150">Nama</th>
                            <td>: {{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: {{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Usia</th>
                            <td>: {{ $profile->usia ?? '-' }} Tahun</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>: {{ $profile->jenis_kelamin ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td>: {{ $profile->bio ?? '-' }}</td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>
    </div>

</div>


<!-- ================= MODAL EDIT PROFILE ================= -->
<div class="modal fade" id="modalEditProfile" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <form action="{{ route('user.profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title fw-bold">
                        <i class="fa-solid fa-user-pen me-2"></i>Edit Profile
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Usia</label>
                            <input type="number" name="usia" class="form-control" value="{{ $profile->usia ?? '' }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="laki-laki" {{ ($profile->gender ?? '') == 'laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="perempuan" {{ ($profile->gender ?? '') == 'perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Bio</label>
                            <textarea name="bio" class="form-control" rows="4">{{ $profile->bio ?? '' }}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Foto Profile</label>
                            <input type="file" name="image_path" class="form-control">
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
