@extends('layout.prodi')
@section('title', 'Course Voting - Prodi Mata Kuliah')

@section('content')
    <div class="m-4">
        <a class="btn btn-primary mt-16" onclick="my_modal_5.showModal()">Tambah Data</a>

            <table class="table table-zebra mt-10 max-w-screen">
                <thead>
                <tr>
                    <th scope="col">ID Polling</th>
                    <th scope="col">Nama Mata Kuliah</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Tanggal Polling</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pollings as $p)
                    <tr>
                        <td>{{$p['polling_id']}}</td>
                        @foreach($getNamaMataKuliah as $gNMK)
                            @if($gNMK['id'] == $p['matakuliah_id'])
                                <td>{{$gNMK['nama_mata_kuliah']}}</td>
                            @endif
                        @endforeach
                        @foreach($getSKSMataKuliah as $gSKS)
                            @if($gSKS['id'] == $p['matakuliah_id'])
                                <td>{{$gSKS['sks']}}</td>
                            @endif
                        @endforeach
                        <td>{{$p['pollling_date']}}</td>

                        <td>
                        <td>
                            <a class="badge badge-error text-white" onclick="modal_{{$p['polling_id']}}.showModal()">Hapus</a>
                            <a class="badge badge-primary text-white" href="{{ route('prodi.editPoll', ['polling_id' => $p['polling_id']]) }}">Edit</a>
                        </td>

                        {{--    Hapus Data Modal--}}
                        <dialog id="modal_{{$p['polling_id']}}" class="modal">
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">Peringatan!</h3>
                                <p class="py-4">Ingin menghapus {{$p['polling_id']}} ?</p>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <a href="/prodi/{{$p['polling_id']}}/delete" class="btn btn-error">Hapus</a>
                                        <button class="btn">Close</button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                        {{--    End Hapus Data Polling  --}}
                        </td>

                    </tr>


    @endforeach
                </tbody>
            </table>
    </div>


    {{--    Add Mata Kuliah--}}
    <dialog id="my_modal_5" class="modal">
        <div class="modal-box">
            <h2 class="font-bold text-lg mb-5">Tambah Data Polling!</h2>
                <form method="post" action="{{route('add-polling')}}">
                    <div>

                        {{-- Id Polling --}}
                        <label class="input input-bordered flex items-center gap-2 mb-5">
                            ID Polling
                            <input id="polling_id" name="polling_id" type="text" class="grow" placeholder="ADA210" />
                        </label>
                        {{-- Tanggal Polling --}}
                        <label class="input input-bordered flex items-center gap-2 mb-5">
                            Polling Date
                            <input id="polling_date" name="polling_date" type="date" class="grow" placeholder="2024-04-22" />
                        </label>
                        {{-- Mata Kuliah --}}
                        <select id="matakuliah_id" name="matakuliah_id" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-5">
                            <option>-- Pilih Mata Kuliah --</option>
                            @foreach($getNamaMataKuliah as $gNMK)
                                <option value="{{$gNMK['id']}}">{{$gNMK['nama_mata_kuliah']}}</option>
                            @endforeach
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
