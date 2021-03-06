@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                    {{--    @foreach($users as $user)
                            {{ $user->nickname }}
                        @endforeach--}}
                        <users :users="{{ $users }}"></users>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
