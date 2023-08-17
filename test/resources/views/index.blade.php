@extends('master')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
    {{ $message }}
</div>

@endif

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Airplane Data</b></div>
            <div class="col col-md-6">
                <a href="{{ route('flights.create') }}" class="btn btn-success btn-sm float-end">Add</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ModelNumber</th>
                <th>From</th>
                <th>Capacity</th>
                <th>Action</th>
            </tr>
            @if(count($data) > 0)

                @foreach($data as $row)

                    <tr>
                        <td>{{ $row->modelnumber }}</td>
                        <td>{{ $row->from }}</td>
                        <td>{{ $row->capacity }}</td>
                        <td>
                            <form method="post" action="{{ route('flights.destroy', $row->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('flights.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('flights.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                            </form>

                        </td>
                    </tr>

                @endforeach

            @else
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
            @endif
        </table>
        {!! $data->links() !!}
    </div>
</div>

@endsection
