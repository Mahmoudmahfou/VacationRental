@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hotels</h5>
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
                    <p class="card-text ">number of hotels: <span class="badge badge-primary" style="font-size: 18px">
                            {{ $hotelsCount }}</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rooms</h5>
                    <p class="card-text">number of rooms: <span class="badge badge-primary" style="font-size: 18px">
                            {{ $roomsCount }}</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admins</h5>

                    <p class="card-text">number of admins: <span class="badge badge-danger"
                            style="font-size: 18px">{{ $adminsCount }}</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
