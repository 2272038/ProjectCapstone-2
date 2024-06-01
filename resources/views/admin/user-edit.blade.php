@extends('layout.admin')
@section('title', 'Course Voting - Admin Users')

@section('content')
    <div class="hero min-h-screen bg-base-200">
    <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" action="{{route('admin.edit-user', ['id' => $users['id']])}}" method="post">
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
                <select id="role_id" name="role_id" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option>Choose a Role</option>
                    <option value="1">Admin</option>
                    <option value="2">Program Studi</option>
                    <option value="3">User</option>
                </select>
            </div>
            <div class="form-control mt-6">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
    </div>

@endsection
