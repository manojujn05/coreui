@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header"><a class="btn btn-success" href="{{ 'create_theater' }}">Add Theater</a></div>

    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert"><b>Success! </b>{{ $message }} <a class="alert-link" href="{{ 'theater' }}">click here to check theaters list</a></div>
        @endif
        <table class="table table-responsive-sm table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Theater</th>
                    <th>Type</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($theaters as $theater)
                <tr>
                    <td>{{ $theater->id }}</td>
                    <td>{{ $theater->name }}</td>
                    <td>{{ $theater->type }}</td>
                    <td>{{ $theater->city }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ 'theater/'. $theater->id }}">
                            <i class="fa fa-search"></i>
                        </a>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record ?')" href="{{route('theater-delete', $theater->id)}}">
                            <i class="fa fa-trash"></i>
                        </a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
</div>
@endsection