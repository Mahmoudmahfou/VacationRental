@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        @if (session()->has('success'))
                            <h4 class="alert alert-success mt-3 text-center w-50 m-auto" role="alert">
                                {{ session('success') }}
                            </h4>
                        @endif
                        @if (session()->has('error'))
                            <h4 class="alert alert-danger mt-3 text-center w-50 m-auto" role="alert">
                                {{ session('error') }}
                            </h4>
                        @endif
                        <h5 class="card-title mb-4 d-inline">Admins</h5>
                        <a href="{{ route('admins.create') }}" class="btn btn-primary mb-4 text-center float-right">Create
                            Admins</a>
                        @if ($allAdmins->count() > 0)
                            <table class="table mt-2 table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">username</th>
                                        <th scope="col">email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allAdmins as $admin)
                                        <tr>
                                            <th scope="row">{{ $admin->id }}</th>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td><a href="{{ route('admins.delete', $admin->id) }}"
                                                    class="btn btn-danger  text-center ">Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h2 class="alert alert-info text-center m-3 mx-auto w-75">No Admins Yet !</h2>
                        @endif
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
