@extends('layout.prodi')
@section('title', 'Course Voting - Prodi Mata Kuliah')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="card shrink-0 w-full max-w-lg shadow-2xl bg-base-100">
            <form class="card-body" action="{{route('prodi.edit-mata-kuliah', ['id' => $matkul['id']])}}" method="post">
                @csrf
                <div class="form-control">
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Kode Mata Kuliah
                        <input id="id" name="id" type="text" class="grow" value="{{$matkul['id']}}" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Nama Mata Kuliah
                        <input id="nama_matkul" name="nama_mata_kuliah" type="text" class="grow" value="{{$matkul['nama_mata_kuliah']}}" />
                    </label>
                </div>
                <div class="mb-6">
                    <select id="kurikulum" name="kurikulum_id" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Choose a Kurikulum</option>
                        <option value="2019">KRS</option>
                        <option value="2022">Baru</option>
                    </select>
                </div>
                <div class="form-control">
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        SKS
                        <input id="sks" name="sks" type="text" class="grow" value="{{$matkul['sks']}}" />
                    </label>
                </div>
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
