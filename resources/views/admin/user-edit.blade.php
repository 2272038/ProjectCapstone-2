@extends('layout.admin')
@section('title', 'internal scholarships - Admin Users')

@section('content')
    <div class="hero min-h-screen bg-base-200">
    <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" action="{{route('admin.edit-user', ['nrp' => $users['nrp']])}}" method="post">
            @csrf
            <div class="form-control">
                <label class="input input-bordered flex items-center gap-2 mb-5">
                    NRP
                    <input id="nrp" name="nrp" type="text" class="grow" value="{{$users['nrp']}}" />
                </label>
            </div>
            <div class="form-control">
                <label class="input input-bordered flex items-center gap-2 mb-5">
                    Nama
                    <input id="name" name="name" type="text" class="grow" value="{{$users['name']}}"/>
                </label>
            </div>
            <div class="form-control">
                <label class="input input-bordered flex items-center gap-2 mb-5">
                    Email
                    <input id="email" name="email" type="email" class="grow" value="{{$users['email']}}" />
                </label>
            </div>
            <div>
                    <select id="role_id" name="role_id" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            style="width: 100%; height: 50px; overflow-y: auto; margin-bottom: 20px;">
                        <option>Choose a Role</option>
                        @foreach($getRole as $role)
                            <option value="{{ $role->id }}" {{ $users->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>

                    <select id="prodi" name="prodi_id" class="block w-full px-4 py-6 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            style="width: 100%; height: 75px; overflow-y: auto;">
                        <option>Choose a Program Studi</option>
                        @foreach($getProdi as $prodi)
                            <option value="{{ $prodi->id }}" {{ $users->prodi_id == $prodi->id ? 'selected' : '' }}>{{ $prodi->nama_prodi }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-control mt-6">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
    </div>

@endsection
