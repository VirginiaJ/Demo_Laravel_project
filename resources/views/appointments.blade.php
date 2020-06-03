@extends('layouts.app')
@section('content')

<?php
$doctors = \App\Doctor::all();
?>

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

<div class="mt-4 d-flex">
    <form class="form-inline d-inline-block" action="{{route('appointments.index')}}" method="get">
        @csrf
        <select class="form-control form-control-sm" name="doctor_id" id="doctor">
            <option value=" " disabled selected>Select doctor</option>
            @foreach ($doctors as $doctor)
            <option value="{{$doctor->id}}">{{$doctor->name}}
                {{$doctor->surname}}</option>
            @endforeach
        </select>
        <input class="btn btn-outline-primary btn-sm" type="submit" value="Show appointments" />
    </form>
    <div class="d-inline-block ml-auto">
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
</div>

<table class="table table-hover mt-2">
    <thead class="thead-light">
        <tr>
            <th>Appointment date and time</th>
            <th>Client</th>
            <th>Doctor</th>
            <th>Description</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appointments as $appointment)
        <tr>
            <td class="align-middle">{{date('Y-m-d H:i', strtotime($appointment->date_time))}}</td>
            <td class="align-middle">{{$appointment->owner->name}} {{$appointment->owner->surname}}</td>
            <td class="align-middle">{{$appointment->doctor->name}} {{$appointment->doctor->surname}}</td>
            <td class="align-middle">{!!$appointment->description!!}</td>
            <td class="w-25 align-middle text-center">
                <form class="d-inline-block" action="{{route('appointments.show', $appointment['id'])}}" method="get">
                    @csrf
                    <input class="btn btn-outline-primary" type="submit" value="Edit info" />
                </form>

                <a href="{{ route('appointments.index', $appointment->id) }}" data-toggle="modal"
                    data-target="#myDeleteModal{{ $appointment->id }}" class="btn btn-outline-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($appointments as $appointment)
<div class="modal fade" id="myDeleteModal{{ $appointment->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td class="align-middle">{{date('Y-m-d H:i', strtotime($appointment->date_time))}}</td>
                        <td class="align-middle">{{$appointment->owner->name}} {{$appointment->owner->surname}}</td>
                        <td class="align-middle">{{$appointment->doctor->name}} {{$appointment->doctor->surname}}</td>
                        <td class="align-middle">{!!$appointment->description!!}</td>
                    </tr>
                </table>
                Are you sure you want to delete this appointment?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <form class="d-inline-block" action="{{route('appointments.destroy', $appointment['id'])}}"
                    method="post">
                    @method('DELETE') @csrf
                    <input class="btn btn-outline-danger" type="submit" value="Delete" />
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection