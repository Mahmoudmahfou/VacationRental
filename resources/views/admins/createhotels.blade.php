@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Hotels</h5>
                    <form method="POST" action="{{route('hotels.save')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control"
                                placeholder="name" />
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="file" name="image" id="form2Example1" class="form-control" />
                            @error('image')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" placeholder="description" rows="3"></textarea>
                            @error('description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <label for="exampleFormControlTextarea1">Location</label>
                            <input type="text" name="location" id="form2Example1" class="form-control" placeholder="location" />
                            @error('location')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 text-center"
                            style="font-size: 20px">Create Hotel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
