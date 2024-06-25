@extends('layout.admin')
@section('title', 'internal scholarships - Admin Users')

@section('content')
    <div class="m-4">
        <div class="flex flex-col">
            <a class="btn btn-primary mt-16 w-40" onclick="addModal.showModal()">Tambah Data</a>
            <div class="mt-2"></div>
            <label class="input input-bordered flex items-center gap-2 w-40">
                <input id="searchInput" type="text" class="w-full" placeholder="Search" oninput="searchUser(this.value)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
            </label>
        </div>
        <table class="table table-zebra mt-10 max-w-screen">
            <thead>
            <tr>
                <th scope="col">NRP</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Prodi</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $u)
                @if(Auth::user()->nrp!= $u['nrp'])
                    <tr>
                        <td>{{ $u['nrp'] }}</td>
                        <td>{{ $u['name'] }}</td>
                        <td>{{ $u['email'] }}</td>
                        @foreach ($getRole as $gr)
                            @if ($gr['id'] == $u['role_id'])
                                <td>{{ $gr['name'] }}</td>
                            @endif
                        @endforeach
                        @php
                            $prodi = \App\Models\Prodi::find($u['prodi_id']);
                            $fakultas = \App\Models\Fakultas::find($prodi->id_fakultas);
                        @endphp
                        <td>{{ $fakultas->nama_fakultas }}</td>
                        <td>{{ $prodi->nama_prodi }}</td>
                        <td>
                            <a class="badge badge-error text-white" onclick="modal_{{$u['nrp']}}.showModal()">Hapus</a>
                            <a class="badge badge-primary text-white" href="{{ route('admin.edit', ['nrp' => $u->nrp]) }}">Edit</a>
                        </td>

                            {{--    Hapus Data Modal--}}
                            <dialog id="modal_{{$u['nrp']}}" class="modal">
                                <div class="modal-box">
                                    <h3 class="font-bold text-lg">Peringatan!</h3>
                                    <p class="py-4">Ingin menghapus {{$u['name']}}?</p>
                                    <div class="modal-action">
                                        <form method="POST" action="/admin/{{$u['nrp']}}/delete">
                                            @csrf
                                            @method('DELETE') <!-- Tambahkan ini jika menggunakan metode DELETE -->
                                            <button type="submit" class="btn btn-error">Hapus</button>
                                        </form> <!-- Menutup tag form yang seharusnya -->
                                        <button type="button" class="btn" onclick="closeModal('modal_{{$u['nrp']}}')">Close</button>
                                    </div>
                                </div>
                            </dialog>
                            {{--    End Hapus Data Modal--}}
                        </tr>
                    @endif
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

                    <!-- Add a margin bottom to the first select element -->
                    <select id="role_id" name="role_id" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            style="width: 100%; height: 50px; overflow-y: auto; margin-bottom: 20px;">
                        <option>Choose a Role</option>
                        @foreach($getRole as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>

                    <select id="prodi" name="prodi_id" class="block w-full px-4 py-6 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            style="width: 100%; height: 75px; overflow-y: auto;">
                        <option>Choose a Program Studi</option>
                        @foreach($getProdi as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                        @endforeach
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
    <script>
        function searchUser(keyword) {
            keyword = keyword.toLowerCase();
            const rows = document.querySelectorAll("table.table tbody tr");

            rows.forEach(row => {
                const nrp = row.cells[0].textContent.toLowerCase();
                const name = row.cells[1].textContent.toLowerCase();
                const email = row.cells[2].textContent.toLowerCase();

                if (nrp.includes(keyword) || name.includes(keyword) || email.includes(keyword)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>

    <script>
        function closeModal(modalId) {
            // Mengambil dialog/modal berdasarkan ID
            var modal = document.getElementById(modalId);
            // Menutup dialog/modal dengan mengubah atribut "open" menjadi false
            modal.close();
        }
    </script>
{{--    End Tambah Data Modal--}}

@endsection

