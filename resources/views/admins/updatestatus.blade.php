@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Update Status</h5>
                    <p class="mt-3 text-secondary">Email : <b>{{ $getData->email }}</b></p>
                    <p class="mt-3 text-secondary">Current status : <b>{{ $getData->status }}</b></p>
                    <form method="POST" action="{{ route('status.update', $getData->id) }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <h4 class="w-50 text-success">Choose status</h4>
                        <select name="status" style="margin-top: 15px;" class="form-control">
                            @if ($getData->status == 'Processing')
                                <option value="Processing">Processing</option>
                                <option value="Booked Successfully">Booked Successfully</option>
                            @else
                                <option value="Booked Successfully">Booked Successfully</option>
                                <option value="Processing">Processing</option>
                            @endif
                        </select>
                        @error('status')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror


                        <!-- Submit button -->
                        <button style="margin-top: 10px; font-size: 19px" type="submit" name="submit"
                            class="btn btn-primary btn-block mb-4 text-center">
                            Update Status
                        </button>


                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
