@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Create User') }}</div>

                    <div class="card-body">
                        <create-user :user="{{isset($user) ? $user : 0 }}"></create-user>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
