@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="panel-body">
            <div class="col-md-12">
                <a class="btn btn-success" href="{{ 'link-merchants' }}">Link Theater Merchant</a>
            </div>
        </div>


    </div>

    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert"><b>Success! </b>{{ $message }} <a class="alert-link" href="{{ 'merchant' }}">click here to check merchant list</a></div>
        @endif

        <table class="table table-responsive-sm table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Merchant</th>
                    <th>Theater</th>
                    <th>Package</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Amount</th>
                </tr>

            </thead>
            <tbody>
                @foreach($merchants as $merchant)
                <tr>
                    <td>{{ $merchant->id }}</td>
                    <td>{{ $merchant->merchant }}</td>
                    <td>{{ $merchant->theater }}</td>
                    <td>{{ $merchant->package }}</td>
                    <td>{{ $merchant->start_date }}</td>
                    <td>{{ $merchant->end_date }}</td>
                    <td>{{ $merchant->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $merchants->links() }}
    </div>
</div>
@endsection