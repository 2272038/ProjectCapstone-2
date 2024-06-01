@extends('layout.prodi')
@section('title', 'Course Voting - Polling')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="card shrink-0 w-full max-w-lg shadow-2xl bg-base-100">
            <form class="card-body" action="{{route('prodi.edit-polling', ['polling_id' => $pollings['polling_id']])}}" method="post">
                @csrf
                <div class="form-control">
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Kode Polling
                        <input id="polling_id" name="polling_id" type="text" class="grow" value="{{$pollings['polling_id']}}" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Tanggal Polling
                        <input id="polling_date" name="polling_date" type="date" class="grow" value="{{$pollings['polling_date']}}" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Kode Mata Kuliah
                        <select id="matakuliah_id" name="matakuliah_id" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-0">
                            <option>-- Pilih Mata Kuliah --</option>
                            @foreach($getNamaMataKuliah as $gNMK)
                                <option value="{{$gNMK['id']}}">{{$gNMK['nama_mata_kuliah']}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
