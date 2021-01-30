@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="panel-body">
            <div class="col-md-12">
                <form class="navbar-form" method="POST" role="search" action="{{ route('merchant-search') }}" name="frm" id="frm">
                    @csrf
                    <div class="row">
                        <label class="col-md-1 control-label">Search</label>
                        <div class="col-md-3 form-group">
                            <input type="text" name='q' class="form-control" id="q">
                        </div>
                        <div class="form-group col-md-3">
                            <select class="form-control" name="option" id="option">
                                <option value=""> -- Select Status -- </option>
                                <option value="ID">ID</option>
                                <option value="Name">Name</option>
                                <option value="Mobile">Mobile</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="submit" class="btn btn-primary" value="Search">
                            <a class="btn btn-success" href="{{ 'create_merchant' }}">Add Merchant</a>
                        </div>
                    </div>
                </form>
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
                    <th>Mobile</th>
                    <th>Business Type</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                @foreach($merchants as $merchant)
                <tr>
                    <td>{{ $merchant->id }}</td>
                    <td>{{ $merchant->name }}</td>
                    <td>{{ $merchant->mobile }}</td>
                    <td>{{ $merchant->business_type }}</td>
                    <td>{{ $merchant->city }}</td>
                    <td>
                        <a class="btn btn-info" href="{{url('merchant',['id'=>$merchant->id]) }}">
                            <i class="fa fa-search"></i>
                        </a>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record ?')" href="{{ url('merchant-delete',['id'=>$merchant->id]) }}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $merchants->links() }}
    </div>
</div>
@endsection