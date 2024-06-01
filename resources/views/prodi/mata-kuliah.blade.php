@extends('layout.prodi')
@section('title', 'Course Voting - Prodi Mata Kuliah')

@section('content')
    <div class="m-4">
        <a class="btn btn-primary mt-16" onclick="my_modal_5.showModal()">Tambah Data</a>

        <table class="table table-zebra mt-10 max-w-screen">
            <thead>
            <tr>
                <th scope="col">ID Mata Kuliah</th>
                <th scope="col">Nama Mata Kuliah</th>
                <th scope="col">Kurikulum</th>
                <th scope="col">SKS</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($matkul as $m)
                <tr>
                    <td>{{$m['id']}}</td>
                    <td>{{$m['nama_mata_kuliah']}}</td>
                    @foreach($getNamaKurikulum as $gnk)
                        @if($gnk['id'] == $m['kurikulum_id'])
                            <td>{{$gnk['nama_kurikulum']}}</td>
                        @endif
                    @endforeach
                    <td>{{$m['sks']}}</td>
                    <td>
                    <td>
                        <a class="badge badge-error text-white" onclick="modal_{{$m['id']}}.showModal()">Hapus</a>
                        <a class="badge badge-primary text-white" href="{{ route('prodi.edit', ['id' => $m->id]) }}">Edit</a>
                    </td>

                    {{--    Hapus Data Modal--}}
                    <dialog id="modal_{{$m['id']}}" class="modal">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg">Peringatan!</h3>
                            <p class="py-4">Ingin menghapus {{$m['nama_mata_kuliah']}} ?</p>
                            <div class="modal-action">
                                <form method="dialog">
                                    <a href="/prodi/{{$m['id']}}/delete" class="btn btn-error">Hapus</a>
                                    <button class="btn">Close</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                    {{--    End Hapus Data Modal--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


{{--    Add Mata Kuliah--}}
    <dialog id="my_modal_5" class="modal">
        <div class="modal-box">
            <h2 class="font-bold text-lg mb-5">Tambah Data Mata Kuliah!</h2>
            <form method="post" action="{{route('add-mata-kuliah')}}">
                <div>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        ID Mata Kuliah
                        <input id="id" name="id" type="text" class="grow" placeholder="e.g 2272028" />
                    </label>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Nama Mata Kuliah
                        <input id="nama_mata_kuliah" name="nama_mata_kuliah" type="text" class="grow" placeholder="e. g John Doe" />
                    </label>

                    <select id="kurikulum_id" name="kurikulum_id" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-5">
                        <option>Choose a Kurikulum</option>
                        <option value="2019">KRS</option>
                        <option value="2022">Baru</option>
                    </select>

                    <select id="sks" name="sks" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-5">
                        <option>Choose a SKS</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>

                </div>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" type="button" onclick="my_modal_5.close()">✕</button>
                    </form>
                    <div>
                        @csrf
                        <button class="btn btn-outline btn-primary" type="submit">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </dialog>
    {{--    End Add Mata Kuliah--}}
@endsection
