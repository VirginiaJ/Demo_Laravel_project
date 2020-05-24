@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <h1>Welcome!</h1>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            You are logged in!
        </div>
        <img src="https://alicedogwalking.com/x/cdn/?https://storage.googleapis.com/wzuk/assets/images/9564821_lel/9564821_lel_1000.jpg"
            alt="animals">

    </div>
</div>
@endsection