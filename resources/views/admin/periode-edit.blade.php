@extends('layout.admin')
@section('title', 'Internal Scholarships - Edit Periode')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Edit Periode</h1>
            </div>
            <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <form class="card-body" method="POST" action="{{ route('admin.periode.update', $periode->id) }}">
                    @csrf
                    @method('POST')
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">ID</span>
                        </label>
                        <input type="text" class="input input-bordered" disabled value="{{ $periode->id }}">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Semester</span>
                        </label>
                        <input type="text" name="semester" class="input input-bordered" value="{{ $periode->semester }}">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Tahun Akademik</span>
                        </label>
                        <input type="text" name="tahun_akademik" class="input input-bordered" value="{{ $periode->tahun_akademik }}">
                    </div>
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
