@extends('layouts.app')
@section('content')
<div class="card">
    <form action="{{route('save_theater')}}" method="post">
        @csrf
        <div class="card-header"><strong>Theater</strong> <small>Form</small></div>
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert"><b>Success! </b>{{ $message }} <a class="alert-link" href="{{ 'theater' }}">click here to check theaters list</a></div>
            @endif
            <div class="form-group">
                <label for="company">Theater</label>
                <input class="form-control" name="theater" type="text" placeholder="Enter theater name" required>
            </div>
            <div class="form-group">
                <label for="vat">Theater type</label>
                <select class="form-control" name="type" required>
                    <option value="0">Please select theater type</option>
                    @foreach ($theatertype as $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="street">Address</label>
                <input class="form-control" name="address" type="text" placeholder="Enter address" required>
            </div>
            <div class=" row">
                <div class="form-group col-sm-4">
                    <label for="city">State</label>
                    <input class="form-control" name="state" type="text" placeholder="Enter your state">
                </div>
                <div class="form-group col-sm-4">
                    <label for="city">City</label>
                    <input class="form-control" name="city" type="text" placeholder="Enter your city">
                </div>
                <div class="form-group col-sm-4">
                    <label for="postal-code">Postal Code</label>
                    <input class="form-control" name="postalcode" type="text" placeholder="Postal Code">
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-info" type="submit">Save changes</button>
                <button class="btn btn-warning" type="button">Cancel</button>
                <a class="btn btn-success" href="{{ 'theater' }}">Theaters list</a>
            </div>
        </div>
    </form>
</div>
@endsection