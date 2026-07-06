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
                        <h5 class="card-title mb-4 d-inline">Rooms</h5>
                        <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-4 text-center float-right">Create
                            Room</a>
                        @if ($allRooms->count() > 0)
                            <table class="table table-dark">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">id</th>
                                        <th scope="col">name</th>
                                        <th scope="col">image</th>
                                        <th scope="col">price</th>
                                        <th scope="col">num of persons</th>
                                        <th scope="col">size</th>
                                        <th scope="col">view</th>
                                        <th scope="col">num of beds</th>
                                        <th scope="col">hotel id</th>
                                        <th scope="col">delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allRooms as $room)
                                        <tr class="text-center">
                                            <th scope="row">{{ $room->id }}</th>
                                            <td>{{ $room->name }}</td>
                                            <td><img src="{{ asset('assets/images/' . $room->image . '') }}"
                                                    style="width: 80px" alt="no upload image"></td>
                                            <td>${{ $room->price }}</td>
                                            <td>{{ $room->max_persons }}</td>
                                            <td>{{ $room->size }}</td>
                                            <td>{{ $room->view }}</td>
                                            <td>{{ $room->num_bed }}</td>
                                            <td>{{ $room->hotel_id }}</td>
                                            <td><a href="{{route('rooms.delete',$room->id)}}"
                                                    class="btn btn-danger  text-center ">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h2 class="alert alert-info text-center m-3 mx-auto w-75">No Rooms Yet !</h2>
                        @endif
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
