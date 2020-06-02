@extends('layouts.app')
@section('content')

<form action="{{route('doctors.update', $doctor->id)}}" method="post">
    @method('PUT') @csrf
    <div class="card">
        <div class="card-header">
            <div class="form-group">
                <label for="name">Doctor name</label>
                <input type="text" class="form-control" name="name" id="name" value={{$doctor->name}} required>
            </div>
            <div class="form-group">
                <label for="surname">Doctor surname</label>
                <input type="text" class="form-control" name="surname" id="surname" value={{$doctor->surname}} required>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value={{$doctor->phone}} required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value={{$doctor->email}} required>
            </div>
            <button type="submit" class="btn btn-outline-primary">Save</button>
        </div>
    </div>
</form>

@endsection