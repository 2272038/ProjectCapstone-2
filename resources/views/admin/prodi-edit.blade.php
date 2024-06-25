@extends('layout.admin')
@section('title', 'Edit Prodi - Admin')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
            <form class="card-body" action="{{ route('admin.prodi.update', ['id' => $prodi->id]) }}" method="post">
                @csrf
                <div class="form-control">
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        ID Prodi
                        <input id="id" name="id" type="text" class="grow" value="{{ $prodi->id }}" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Nama Prodi
                        <input id="nama_prodi" name="nama_prodi" type="text" class="grow" value="{{ $prodi->nama_prodi }}" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Fakultas
                        <select id="id_fakultas" name="id_fakultas" class="grow">
                            <option value="">Pilih Fakultas</option>
                            @foreach($fakultas as $f)
                                <option value="{{ $f->id }}" {{ $prodi->id_fakultas == $f->id ? 'selected' : '' }}>{{ $f->nama_fakultas }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
