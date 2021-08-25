@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-body">
                    <a href="{{url('admin/home')}}">Admin</a>
                </div>
                <div class="panel-body">
                    <a href="{{url('client/home')}}">Client</a>

@endsection
