@extends('layout.admin')
@section('title', 'Internal Scholarships - Admin Periode')

@section('content')
    <div class="m-4">
        <div class="flex flex-col">
            <a class="btn btn-primary mt-16 w-40" onclick="addModal.showModal()">Tambah Periode</a>
            <div class="mt-2"></div>
            <label class="input input-bordered flex items-center gap-2 w-40">
                <input id="searchInput" type="text" class="w-full" placeholder="Search" oninput="searchPeriode(this.value)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
                </svg>
            </label>
        </div>
        <table class="table table-zebra mt-10 max-w-screen">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Semester</th>
                <th scope="col">Tahun Akademik</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($periodes as $periode)
                <tr>
                    <td>{{ $periode->id }}</td>
                    <td>{{ $periode->semester }}</td>
                    <td>{{ $periode->tahun_akademik }}</td>
                    <td>
                        <a class="badge badge-primary text-white" href="{{ route('admin.periode.edit', $periode->id) }}">Edit</a>
                        <a class="badge badge-error text-white" onclick="modal_{{ $periode->id }}.showModal()">Hapus</a>
                    </td>
                    <dialog id="modal_{{ $periode->id }}" class="modal">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg">Peringatan!</h3>
                            <p class="py-4">Ingin menghapus periode dengan ID {{ $periode->id }}?</p>
                            <div class="modal-action">
                                <form method="POST" action="{{ route('admin.periode.delete', $periode->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error">Hapus</button>
                                </form>
                                <button type="button" class="btn" onclick="closeModal('modal_{{ $periode->id }}')">Close</button>
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
            <h2 class="font-bold text-lg mb-5">Tambah Data Periode</h2>
            <form method="post" action="{{ route('admin.periode.add') }}">
                @csrf
                <div>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        ID Periode
                        <input id="id" name="id" type="text" class="grow" placeholder="e.g 1" />
                    </label>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Semester
                        <input id="semester" name="semester" type="text" class="grow" placeholder="e.g Ganjil" />
                    </label>
                    <label class="input input-bordered flex items-center gap-2 mb-5">
                        Tahun Akademik
                        <input id="tahun_akademik" name="tahun_akademik" type="text" class="grow" placeholder="e.g 2024/2025" />
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
        function searchPeriode(keyword) {
            keyword = keyword.toLowerCase();
            const rows = document.querySelectorAll("table.table tbody tr");

            rows.forEach(row => {
                const semester = row.cells[1].textContent.toLowerCase();
                const tahunAkademik = row.cells[2].textContent.toLowerCase();

                if (semester.includes(keyword) || tahunAkademik.includes(keyword)) {
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
