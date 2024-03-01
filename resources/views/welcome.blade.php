@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-5 d-flex justify-content-center align-items-center">
            <button type="button" class="btn btn-outline-success btn-dashboard"><a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></button>
        </div>
        
    </div>
</div>

@endsection