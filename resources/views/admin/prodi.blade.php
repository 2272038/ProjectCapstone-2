@extends('layout.admin')
@section('title', 'Internal Scholarships - Admin Prodi')

@section('content')
    <div class="m-4">
        <div class="flex flex-col">
            <a class="btn btn-primary mt-16 w-40" onclick="addModal.showModal()">Tambah Prodi</a>
            <div class="mt-2"></div>
            <label class="input input-bordered flex items-center gap-2 w-40">
                <input id="searchInput" type="text" class="w-full" placeholder="Search" oninput="searchProdi(this.value)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
                </svg>
            </label>
        </div>
        <table class="table table-zebra mt-10 max-w-screen">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Prodi</th>
                <th scope="col">Nama Fakultas</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($prodis as $prodi)
                <tr>
                    <td>{{ $prodi->id }}</td>
                    <td>{{ $prodi->nama_prodi }}</td>
                    <td>{{ $prodi->fakultas->nama_fakultas }}</td>
                    <td>
                        <a class="badge badge-primary text-white" href="{{ route('admin.prodi.edit', $prodi->id) }}">Edit</a>
                        <a class="badge badge-error text-white" onclick="modal_{{ $prodi->id }}.showModal()">Hapus</a>
                    </td>
                    <dialog id="modal_{{ $prodi->id }}" class="modal">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg">Peringatan!</h3>
                            <p class="py-4">Ingin menghapus {{ $prodi->nama_prodi }}?</p>
                            <div class="modal-action">
                                <form method="POST" action="{{ route('admin.prodi.delete', $prodi->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error">Hapus</button>
                                </form>
                                <button type="button" class="btn" onclick="closeModal('modal_{{ $prodi->id }}')">Close</button>
                            </div>
                        </div>
                    </dialog>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <dialog id="addModal" class="modal">
        <div class="modal-box">
            <h2 class="font-bold text-lg mb-5">Tambah Data Prodi</h2>
            <form method="post" action="{{ route('admin.prodi.add') }}">
                @csrf
                <div>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        ID Prodi
                        <input id="id" name="id" type="text" class="grow" placeholder="e.g P001" />
                    </label>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Nama Prodi
                        <input id="nama_prodi" name="nama_prodi" type="text" class="grow" placeholder="e.g Teknik Informatika" />
                    </label>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Fakultas
                        <select id="id_fakultas" name="id_fakultas" class="grow">
                            <option value="">Pilih Fakultas</option>
                            @foreach($fakultas as $fakultas)
                                <option value="{{ $fakultas->id }}">{{ $fakultas->nama_fakultas }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="modal-action">
                    <button class="btn btn-outline btn-primary" type="submit">Tambah Data</button>
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" type="button" onclick="addModal.close()">✕</button>
                </div>
            </form>
        </div>
    </dialog>

    <script>
        function searchProdi(keyword) {
            keyword = keyword.toLowerCase();
            const rows = document.querySelectorAll("table.table tbody tr");

            rows.forEach(row => {
                const namaProdi = row.cells[1].textContent.toLowerCase();
                const namaFakultas = row.cells[2].textContent.toLowerCase();

                if (namaProdi.includes(keyword) || namaFakultas.includes(keyword)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        function closeModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.close();
        }
    </script>
@endsection
