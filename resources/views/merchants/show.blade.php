@extends('layouts.app')



@section('content')

<?php //dd($theater); 

?>

<div class="card">

    <form action="{{route('merchant.edit')}}" method="post">

        @csrf

        <div class="card-header"><strong>Merchant</strong> <small>Form</small></div>
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert"><b>Success! </b>{{ $message }} <a class="alert-link" href="{{ url('merchant') }}">click here to check merchants list</a></div>
            @endif

            <div class="form-group">
                <label for="company">Merchant</label>
                <input class="form-control" name="merchant" type="text" placeholder="Enter merchant name" value="{{ $merchant->name }}" required>
                <input name="merchant_id" type="hidden" value="{{ $merchant->id }}">
            </div>

            <div class="form-group">
                <label for="company">Mobile</label>
                <input class="form-control" name="mobile" type="text" placeholder="Enter Mobile number" value="{{ $merchant->mobile }}" required>
            </div>

            <div class="form-group">
                <label for="vat">Business type</label>
                <input class="form-control" name="business_type" type="text" placeholder="Enter business type" value="{{ $merchant->business_type }}" required>
            </div>

            <div class="form-group">
                <label for="street">Address</label>
                <input class="form-control" name="address" type="text" placeholder="Enter address" value="{{ $merchant->address }}" required>
            </div>

            <div class=" row">
                <div class="form-group col-sm-4">
                    <label for="city">State</label>
                    <input class="form-control" name="state" type="text" placeholder="Enter your state" value="{{ $merchant->state }}">
                </div>

                <div class="form-group col-sm-4">
                    <label for="city">City</label>
                    <input class="form-control" name="city" type="text" placeholder="Enter your city" value="{{ $merchant->city }}">
                </div>

            </div>

            <div class="form-actions">
                <button class="btn btn-info" type="submit">Save changes</button>
                <button class="btn btn-warning" type="button">Cancel</button>
                <a class="btn btn-success" href="{{ url('merchant') }}">Merchant list</a>
            </div>

        </div>
    </form>
</div>
@endsection