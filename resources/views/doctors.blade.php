@extends('layouts.app')
@section('content')

<button class="btn btn-outline-primary">
    <a href="{{route('newDoctor')}}">New doctor</a></button>

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
            <th>Doctor name and surname</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doctors as $doctor)
        <tr>
            <td class="align-middle">{{$doctor->name}} {{$doctor->surname}}</td>
            <td class="align-middle">{{$doctor->phone}}</td>
            <td class="align-middle">{{$doctor->email}}</td>
            <td class="w-25 align-middle">
                <form class="d-inline-block" action="{{route('doctors.show', $doctor['id'])}}" method="get">
                    @csrf
                    <input class="btn btn-outline-primary" type="submit" value="Edit info" />
                </form>
                <form class="d-inline-block" action="{{route('doctors.destroy', $doctor['id'])}}" method="post">
                    @method('DELETE') @csrf
                    <input class="btn btn-outline-danger" type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection