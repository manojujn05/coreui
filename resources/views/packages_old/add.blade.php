@extends('layouts.app')

@section('content')

<div class="card">
    <form action="{{route('save_package')}}" method="post">
        @csrf
        <div class="card-header"><strong>Package</strong> <small>Form</small></div>
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert"><b>Success! </b>{{ $message }} <a class="alert-link" href="{{ '/packages' }}">click here to check packages list</a></div>
            @endif
            <div class="form-group">
                <label for="company">Package</label>
                <input class="form-control" name="package" type="text" placeholder="Enter package name" required>
            </div>
            <div class="form-group">
                <label for="street">Price</label>
                <input class="form-control" name="price" type="text" placeholder="Enter package price" required>
            </div>

            <div class="form-actions">
                <button class="btn btn-info" type="submit">Save changes</button>
                <button class="btn btn-warning" type="button">Cancel</button>
                <a class="btn btn-success" href="{{ 'packages' }}">Packages list</a>
            </div>
        </div>
    </form>
</div>
@endsection