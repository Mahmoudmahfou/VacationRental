@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('error'))
                        <h4 class="alert alert-danger m-auto text-center" style="color:red;width: 25%;">{{ Session::get('error') }}
                        </h4>
                    @endif
                    <h5 class="card-title mt-2">Login</h5>
                    <form method="POST" class="p-auto" action="{{ route('check.login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form2Example1" class="form-control"
                                placeholder="Email" />
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example2" placeholder="Password"
                                class="form-control" />
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit"
                            class="btn btn-primary btn-block mb-4 text-center">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
