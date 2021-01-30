@extends('layouts.app')

@section('content')
<?php //dd($theater); 
?>
<div class="card">
    <form action="{{route('theater.edit')}}" method="post">
        @csrf
        <div class="card-header"><strong>Theater</strong> <small>Form</small></div>
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert"><b>Success! </b>{{ $message }} <a class="alert-link" href="{{ 'theater' }}">click here to check theaters list</a></div>
            @endif
            <div class="form-group">
                <label for="company">Theater</label>
                <input class="form-control" name="theater" type="text" placeholder="Enter theater name" value="{{ $theater->name }}" required>
                <input name="theater_id" type="hidden" value="{{ $theater->id }}">
            </div>
            <div class="form-group">
                <label for="vat">Theater type</label>
                <select class="form-control" name="type" required>
                    <option value="0">Please select theater type</option>
                    <option {{old('type',$theater->type)=="DOM"? 'selected':''}} value="DOM">DOM</option>
                    <option {{old('type',$theater->type)=="Miniplex"? 'selected':''}} value="Miniplex">Miniplex</option>
                    <option {{old('type',$theater->type)=="Multiplex"? 'selected':''}} value="Multiplex">Multiplex</option>
                </select>
            </div>
            <div class="form-group">
                <label for="street">Address</label>
                <input class="form-control" name="address" type="text" placeholder="Enter address" value="{{ $theater->address }}" required>
            </div>
            <div class=" row">
                <div class="form-group col-sm-4">
                    <label for="city">State</label>
                    <input class="form-control" name="state" type="text" placeholder="Enter your state" value="{{ $theater->state }}" required>
                </div>
                <div class="form-group col-sm-4">
                    <label for="city">City</label>
                    <input class="form-control" name="city" type="text" placeholder="Enter your city" value="{{ $theater->city }}" required>
                </div>
                <div class="form-group col-sm-4">
                    <label for="postal-code">Postal Code</label>
                    <input class="form-control" name="postalcode" type="text" placeholder="Postal Code" value="{{ $theater->name }}" required>
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