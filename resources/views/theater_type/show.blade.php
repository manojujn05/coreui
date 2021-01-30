@extends('layouts.app')

@section('content')

<div class="card">
    <form action="{{route('theatertypes_update')}}" method="post">
        @csrf
        <div class="card-header"><strong>Theater Type</strong> <small>Form</small></div>
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert"><b>Success! </b>{{ $message }} <a class="alert-link" href="{{ url('theatertype') }}">click here to check theater type list</a></div>
            @endif
            <div class="form-group">
                <input class="form-control" name="id" type="hidden" value="{{$theater->id}}">
                <label for="company">Theater Type</label>
                <input class="form-control" name="theatertype" type="text" value="{{$theater->name}}" required>
            </div>


            <div class="form-actions">
                <button class="btn btn-info" type="submit">Save changes</button>
                <button class="btn btn-warning" type="button">Cancel</button>
                <a class="btn btn-success" href="{{ url('theatertype') }}">Theater type list</a>
            </div>
        </div>
    </form>
</div>
@endsection