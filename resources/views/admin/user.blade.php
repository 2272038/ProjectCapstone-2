@extends('layout.admin')
@section('title', 'Course Voting - Admin Users')

@section('content')
    <div class="m-4">
        <a class="btn btn-primary mt-16" onclick="addModal.showModal()">Tambah Data</a>

        <table class="table table-zebra mt-10 max-w-screen">
            <thead>
                <tr>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $u['nrp'] }}</td>
                        <td>{{ $u['name'] }}</td>
                        <td>{{ $u['email'] }}</td>
                        @foreach ($getRole as $gr)
                            @if ($gr['id'] == $u['role_id'])
                                <td>{{ $gr['name'] }}</td>
                            @endif
                        @endforeach
                        <td>
                            <a class="badge badge-error text-white" onclick="modal_{{$u['id']}}.showModal()">Hapus</a>
                            <a class="badge badge-primary text-white" href="{{ route('admin.edit', ['id' => $u->id]) }}">Edit</a>
                        </td>

                        {{--    Hapus Data Modal--}}
                        <dialog id="modal_{{$u['id']}}" class="modal">
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">Peringatan!</h3>
                                <p class="py-4">Ingin menghapus {{$u['name']}} ?</p>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <a href="/admin/{{$u['id']}}/delete" class="btn btn-error">Hapus</a>
                                        <button class="btn">Close</button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                        {{--    End Hapus Data Modal--}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

{{--    Tambah Data Modal --}}
    <dialog id="addModal" class="modal">
        <div class="modal-box">
            <h2 class="font-bold text-lg mb-5">Tambah Data User</h2>
            <form method="post" action="{{route('add-user')}}">
                <div>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        NRP
                        <input id="nrp" name="nrp" type="text" class="grow" placeholder="e.g 2272028" />
                    </label>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Nama
                        <input id="name" name="name" type="text" class="grow" placeholder="e. g John Doe" />
                    </label>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Email
                        <input id="email" name="email" type="email" class="grow" placeholder="e.g abc@example" />
                    </label>
                    <select id="role_id" name="role_id" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Choose a Role</option>
                        <option value="1">Admin</option>
                        <option value="2">Program Studi</option>
                        <option value="3">User</option>
                    </select>
                </div>
                <div class="modal-action">
                    @csrf
                    <button class="btn btn-outline btn-primary" type="submit" id="">Tambah Data</button>
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" type="button" onclick="addModal.close()">✕</button>
                    </form>
                </div>
            </form>
        </div>
    </dialog>
{{--    End Tambah Data Modal--}}

@endsection
