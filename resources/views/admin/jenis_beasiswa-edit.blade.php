@extends('layout.admin')
@section('title', 'Internal Scholarships - Edit Jenis Beasiswa')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Edit Jenis Beasiswa</h1>
            </div>
            <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <form class="card-body" method="POST" action="{{ route('admin.jenis_beasiswa.update', $jenisBeasiswa->id) }}">
                    @csrf
                    @method('POST')
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">ID</span>
                        </label>
                        <input type="text" class="input input-bordered" disabled value="{{ $jenisBeasiswa->id }}">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama Beasiswa</span>
                        </label>
                        <input type="text" name="nama_beasiswa" class="input input-bordered" value="{{ $jenisBeasiswa->nama_beasiswa }}">
                    </div>
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
