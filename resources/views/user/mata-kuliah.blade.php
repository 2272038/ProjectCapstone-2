@extends('layout.layout')
@section('title', 'Course Voting - Admin Mata Kuliah')

@section('content')

    <div class="m-4">
        <table class="table table-zebra mt-20 max-w-screen">
            <thead>
            <tr>
                <th scope="col">ID Mata Kuliah</th>
                <th scope="col">Nama Mata Kuliah</th>
                <th scope="col">Kurikulum ID</th>
                <th scope="col">SKS</th>
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

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
