@extends('user-post.template')

@section('title','Setting Profile')

@section('content')

<h3 class="fw-bold mb-4">Setting Profile</h3>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <form>
            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" value="Fian">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="user@gmail.com">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Password Baru</label>
                    <input type="password" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Foto Profile</label>
                    <input type="file" class="form-control">
                </div>

                <div class="col-12">
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>

            </div>
        </form>

    </div>
</div>

@endsection
