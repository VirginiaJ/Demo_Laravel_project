@extends('layouts.app')
@section('content')

<?php
$doctors = \App\Doctor::all();
$clients = \App\Owner::all();
?>

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

<form action="{{route('appointments.store')}}" method="post">
    @csrf
    <div class="card">
        <div class="card-header">
            <div class="form-group">
                <label for="doctor_id">Doctor</label>
                <select class="form-control" name="doctor_id" id="doctor">
                    <option value=" " disabled selected>Select doctor</option>
                    @foreach ($doctors as $doctor)
                    <option value="{{$doctor->id}}">{{$doctor->name}} {{$doctor->surname}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="owner_id">Client</label>
                <select class="form-control" name="owner_id" id="owner">
                    <option value=" " disabled selected>Select client</option>
                    @foreach ($clients as $client)
                    <option value="{{$client->id}}">{{$client->name}} {{$client->surname}} (@foreach ($client->pets as $pet) {{$pet['type']}} {{$pet['name']}} @endforeach)</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date">
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" name="time">
            </div>
            <div class="form-group">
                <label for="description">Appointment description</label>
                <textarea class="form-control" rows="3" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-primary">Add appointment</button>
        </div>
    </div>
</form>

@endsection