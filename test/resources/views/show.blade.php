@extends('master')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Airplane Details</b></div>
            <div class="col col-md-6">
                <a href="{{ route('flights.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>ModelNumber</b></label>
            <div class="col-sm-10">
                {{ $flight->modelnumber }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>From</b></label>
            <div class="col-sm-10">
                {{ $flight->from }}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-sm-2 col-label-form"><b>Capacity</b></label>
            <div class="col-sm-10">
                {{ $flight->capacity }}
            </div>
        </div>
        </div>
    </div>
</div>

@endsection('content')


