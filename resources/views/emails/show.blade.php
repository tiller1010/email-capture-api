@extends('layouts.app')

@section('content')
@auth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ url()->previous() }}">< Back</a>
            <h1 scope="col">Messages from {{ $email }}:</h1>
            <ul class="list-group">
                @foreach($messages as $message)
                    <li class="list-group-item">
                        {{ $message }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endauth
@endsection
