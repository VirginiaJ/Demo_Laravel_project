@extends('layouts.app')
@section('content')

<button class="btn btn-outline-primary">
    <a href="{{route('newClient')}}">New client</a></button>

@if (session('status_success'))
<div class="alert alert-success mt-4">
    {{session('status_success')}}
</div>
@elseif (session('status_error'))
<div class="alert alert-danger mt-4">
    {{session('status_error')}}
</div>
@endif

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger mt-4">
    {{$error}}
</div>
@endforeach
@endif

<table class="table table-hover mt-4">
    <thead class="thead-light">
        <tr>
            <th>Client name and surname</th>
            <th>Pets</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($owners as $owner)
        <tr>
            <td class="align-middle">{{$owner->name}} {{$owner->surname}}</td>
            <td class="align-middle">@foreach ($owner->pets as $pet) {{$pet['type']}} {{$pet['name']}} <br>@endforeach</td>
            <td class="w-25 align-middle">
                <form class="d-inline-block" action="{{route('clients.show', $owner['id'])}}" method="get">
                    @csrf
                    <input class="btn btn-outline-primary" type="submit" value="More details" />
                </form>
                <form class="d-inline-block" action="{{route('clients.destroy', $owner['id'])}}" method="post">
                    @method('DELETE') @csrf
                    <input class="btn btn-outline-danger" type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection