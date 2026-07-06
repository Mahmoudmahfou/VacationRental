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
                        <h5 class="card-title mb-4 d-inline">Hotels</h5>
                        <a href="{{ route('hotels.create') }}" class="btn btn-primary mb-4 text-center float-right">Create
                            Hotels</a>
                        @if ($allHotels->count() > 0)
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">name</th>
                                        <th scope="col">location</th>
                                        <th scope="col">description</th>
                                        <th scope="col">update</th>
                                        <th scope="col">delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allHotels as $hotel)
                                        <tr>
                                            <th scope="row">{{ $hotel->id }}</th>
                                            <td>{{ $hotel->name }}</td>
                                            <td>{{ $hotel->location }}</td>
                                            <td>{{ $hotel->description }}</td>
                                            <td><a href="{{ route('hotels.edit', $hotel->id) }}"
                                                    class="btn btn-warning text-white text-center ">Update
                                                </a></td>
                                            <td><a href="{{ route('hotels.delete', $hotel->id) }}"
                                                    class="btn btn-danger  text-center ">Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h2 class="alert alert-info text-center m-3 mx-auto w-75">No Hotels Yet !</h2>
                        @endif
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
