@extends('layout.prodi')
@section('title', 'Course Voting - Prodi Profile')

@section('content')
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Your Profile!</h1>
                <p class="py-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti reiciendis nulla
                    expedita. Expedita explicabo et</p>
            </div>
            <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <form class="card-body">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">NRP</span>
                        </label>
                        <input type="text" class="input input-bordered" disabled value="{{$user['nrp']}}">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama</span>
                        </label>
                        <input type="text" class="input input-bordered" disabled value="{{$user['name']}}">
                        <label class="label">
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" class="input input-bordered" disabled value="{{$user['email']}}">
                        <label class="label">
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Role</span>
                        </label>
                        <input type="text" class="input input-bordered" disabled value="{{$user['role']['name']}}">
                        <label class="label">
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
