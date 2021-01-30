@extends('layouts.app')
@section('content')
<div class="card">
    <form action="{{route('save-linking')}}" method="post">
        @csrf
        <div class="card-header"><strong>Theater Merchant Linkage</strong> <small>Form</small></div>
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert"><b>Success! </b>{{ $message }} <a class="alert-link" href="{{ 'theater' }}">click here to check theaters list</a></div>
            @endif
            <div class=" row">
                <div class="form-group col-sm-6">
                    <label for="company">Vendor</label>
                    <select class="form-control" name="merchant" required>
                        <option value="0">Please select merchant</option>
                        @foreach ($merchants as $merchant)
                        <option value="{{$merchant->id}}">{{$merchant->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="company">Theater</label>
                    <select class="form-control" name="theater" required>
                        <option value="0">Please select theater</option>
                        @foreach ($theaters as $theater)
                        <option value="{{$theater->id}}">{{$theater->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class=" row">
                <div class="form-group col-sm-6">
                    <label for="city">Start Date</label>
                    <input type="date" name="sdate" placeholder="Enter start date" class="form-control">
                </div>
                <div class="form-group col-sm-6">
                    <label for="city">End Date</label>
                    <input type="date" name="edate" placeholder="Enter end date" class="form-control">
                </div>
            </div>

            <div class=" row">
                <div class="form-group col-sm-6">
                    <label for="vat">Package</label>
                    <select class="form-control" name="package" required>
                        <option value="0">Please select package</option>
                        @foreach ($packages as $package)
                        <option value="{{$package->id}}">{{$package->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="city">Amount</label>
                    <input class="form-control" name="amount" type="number" placeholder="Enter your amount">
                </div>
            </div>


            <div class=" row">
                <div class="form-group col-sm-6">
                    <label for="city">Ad. Duration</label>
                    <input class="form-control" name="ad_duration" type="text" placeholder="Enter Ad. duration">
                </div>
                <div class="form-group col-sm-6">
                    <label for="city">No of shows in a day</label>
                    <select class="form-control" name="no_of_shows" required>
                        <option value="0">Please select no of shows</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-info" type="submit">Save changes</button>
                <button class="btn btn-warning" type="button">Cancel</button>
                <a class="btn btn-success" href="{{ 'merchant-theater' }}">Merchant Theaters list</a>
            </div>
        </div>
    </form>
</div>
@endsection