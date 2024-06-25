@extends('layout.admin')
@section('title', 'Internal Scholarships - Admin Jenis Beasiswa')

@section('content')
    <div class="m-4">
        <div class="flex flex-col">
            <a class="btn btn-primary mt-16 w-40" onclick="addModal.showModal()">Tambah Jenis Beasiswa</a>
            <div class="mt-2"></div>
            <label class="input input-bordered flex items-center gap-2 w-40">
                <input id="searchInput" type="text" class="w-full" placeholder="Search" oninput="searchJenisBeasiswa(this.value)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
                </svg>
            </label>
        </div>
        <table class="table table-zebra mt-10 max-w-screen">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Beasiswa</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($jenisBeasiswas as $jenisBeasiswa)
                <tr>
                    <td>{{ $jenisBeasiswa->id }}</td>
                    <td>{{ $jenisBeasiswa->nama_beasiswa }}</td>
                    <td>
                        <a class="badge badge-primary text-white" href="{{ route('admin.jenis_beasiswa.edit', $jenisBeasiswa->id) }}">Edit</a>
                        <a class="badge badge-error text-white" onclick="modal_{{ $jenisBeasiswa->id }}.showModal()">Hapus</a>
                    </td>
                    <dialog id="modal_{{ $jenisBeasiswa->id }}" class="modal">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg">Peringatan!</h3>
                            <p class="py-4">Ingin menghapus {{ $jenisBeasiswa->nama_beasiswa }}?</p>
                            <div class="modal-action">
                                <form method="POST" action="{{ route('admin.jenis_beasiswa.delete', $jenisBeasiswa->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error">Hapus</button>
                                </form>
                                <button type="button" class="btn" onclick="closeModal('modal_{{ $jenisBeasiswa->id }}')">Close</button>
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
            <h2 class="font-bold text-lg mb-5">Tambah Jenis Beasiswa</h2>
            <form method="post" action="{{ route('admin.jenis_beasiswa.add') }}">
                @csrf
                <div>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Nama Beasiswa
                        <input id="nama_beasiswa" name="nama_beasiswa" type="text" class="grow" placeholder="e.g Prestasi Akademik" />
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
        function searchJenisBeasiswa(keyword) {
            keyword = keyword.toLowerCase();
            const rows = document.querySelectorAll("table.table tbody tr");

            rows.forEach(row => {
                const namaBeasiswa = row.cells[1].textContent.toLowerCase();

                if (namaBeasiswa.includes(keyword)) {
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
