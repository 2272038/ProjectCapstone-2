@extends('layout.admin')
@section('title', 'Course Voting - Admin Mata Kuliah')

@section('content')
    <div class="m-4">
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
                        <form class="mb-2" method="post" action="/rental/{{$m['id']}}/delete">
                            @csrf
                            <button class="badge badge-error text-white">Hapus</button>
                        </form>
                        <a href="/rental/{{$m['id']}}">
                            <button class="badge badge-primary">Edit</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
