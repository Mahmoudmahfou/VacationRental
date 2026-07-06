@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Rooms</h5>
                    <form method="POST" action="{{ route('rooms.save') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control"
                                placeholder="name" />
                            @error('name')
                                <div class="alert alert-danger mt-2 ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="file" name="image" id="form2Example1" class="form-control" />
                            @error('image')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price" id="form2Example1" class="form-control"
                                placeholder="price" />
                            @error('price')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="max_persons" id="form2Example1" class="form-control"
                                placeholder="num_persons" />
                            @error('max_persons')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="num_bed" id="form2Example1" class="form-control"
                                placeholder="num_beds" />
                            @error('num_bed')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="size" id="form2Example1" class="form-control"
                                placeholder="size" />
                            @error('size')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="view" id="form2Example1" class="form-control"
                                placeholder="view" />
                            @error('view')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <select class="form-control" name="hotel_id">
                            <option>Choose Hotel Name</option>
                            @foreach ($hotels as $hotel)
                                <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                            @endforeach
                        </select>
                        @error('hotel_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <br>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 text-center"
                            style="font-size: 19px">Create Room</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
