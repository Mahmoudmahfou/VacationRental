@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('success'))
                        <h4 class="alert alert-success mt-3 text-center w-50 m-auto" role="alert">
                            {{ session('success') }}
                        </h4>
                    @endif
                    @if (session()->has('Deleted'))
                        <h4 class="alert alert-danger mt-3 text-center w-50 m-auto" role="alert">
                            {{ session('Deleted') }}
                        </h4>
                    @endif
                    <h5 class="card-title mb-4 d-inline">Bookings</h5>
                    @if ($bookings->count() > 0)
                        <table class="table table-responsive table-dark mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">id</th>
                                    <th scope="col">check in</th>
                                    <th scope="col">check out</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phone number</th>
                                    <th scope="col">full name</th>
                                    <th scope="col">hotel name</th>
                                    <th scope="col">room name</th>
                                    <th scope="col">status</th>
                                    <th scope="col">payment</th>
                                    <th scope="col">change status</th>
                                    <th scope="col">delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr class="text-center">
                                        <th scope="row">{{ $booking->id }}</th>
                                        <td>{{ $booking->check_in }}</td>
                                        <td>{{ $booking->check_out }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->phone_number }}</td>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->hotel_name }}</td>
                                        <td>{{ $booking->room_name }}</td>
                                        <td>{{ $booking->status }}</td>
                                        <td>${{ $booking->price }}</td>
                                        <td><a href="{{ route('edit.status', $booking->id) }}"
                                                class="btn btn-warning  text-center ">change status</a></td>
                                        <td><a href="{{ route('bookings.delete', $booking->id) }}"
                                                class="btn btn-danger  text-center ">delete</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <h2 class="alert alert-info text-center m-3 mx-auto w-75">No Bookings Yet !</h2>
                    @endif
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
