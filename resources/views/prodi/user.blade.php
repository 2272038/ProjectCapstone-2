@extends('layout.prodi')
@section('title', 'Course Voting - Prodi Users')

@section('content')
    <div class="m-4">
        <table class="table table-zebra mt-10 max-w-screen">
            <thead>
            <tr>
                <th scope="col">NRP</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
