@extends('layouts.app')
@section('content')

<button class="btn btn-outline-primary">
    <a href="{{route('newAppointment')}}">New appointment</a></button>

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

<div class="mt-4">
    <p class="d-inline-block">Filter: </p>
    <form class="d-inline-block" action="{{route('appointments.index')}}" method="get">
        @csrf
        <input type="hidden" name="today" />
        <input class="btn btn-outline-primary btn-sm" type="submit" value="Today" />
    </form>
    <form class="d-inline-block" action="{{route('appointments.index')}}" method="get">
        @csrf
        <input type="hidden" name="thisWeek" />
        <input class="btn btn-outline-primary btn-sm" type="submit" value="This Week" />
    </form>
    <form class="d-inline-block" action="{{route('appointments.index')}}" method="get">
        @csrf
        <input class="btn btn-outline-primary btn-sm" type="submit" value="All" />
    </form>
</div>

<table class="table table-hover mt-2">
    <thead class="thead-light">
        <tr>
            <th>Appointment date and time</th>
            <th>Client</th>
            <th>Doctor</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appointments as $appointment)
        <tr>
            <td class="align-middle">{{$appointment->date_time}}</td>
            <td class="align-middle">{{$appointment->owner->name}} {{$appointment->owner->surname}}</td>
            <td class="align-middle">{{$appointment->doctor->name}} {{$appointment->doctor->surname}}</td>
            <td class="align-middle">{!!$appointment->description!!}</td>
            <td class="w-25 align-middle">
                <form class="d-inline-block" action="{{route('appointments.show', $appointment['id'])}}" method="get">
                    @csrf
                    <input class="btn btn-outline-primary" type="submit" value="Edit info" />
                </form>
                <form class="d-inline-block" action="{{route('appointments.destroy', $appointment['id'])}}"
                    method="post">
                    @method('DELETE') @csrf
                    <input class="btn btn-outline-danger" type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection