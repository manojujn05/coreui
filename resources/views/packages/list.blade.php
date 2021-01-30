@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><a class="btn btn-success" href="{{ 'create_package' }}">Add New Package</a></div>
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert"><b>Success! </b>{{ $message }} <a class="alert-link" href="{{route('package')}}">click here to check package list</a></div>
        @endif
        <table class="table table-responsive-sm table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Package</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($theaters as $theater)
                <tr>
                    <td>{{ $theater->id }}</td>
                    <td>{{ $theater->name }}</td>
                    <td>{{ $theater->price }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ url('packages',['id'=>$theater->id]) }}">
                            <i class="fa fa-search"></i>
                        </a>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record ?')" href="{{route('package-delete', $theater->id)}}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection