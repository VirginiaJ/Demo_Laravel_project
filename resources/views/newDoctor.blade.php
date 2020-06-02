@extends('layouts.app')
@section('content')

<form action="{{route('doctors.store')}}" method="post">
    @csrf
    <div class="card">
        <div class="card-header">
            <div class="form-group">
                <label for="name">Doctor name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="surname">Doctor surname</label>
                <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" required>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            <button type="submit" class="btn btn-outline-primary">Add</button>
        </div>
    </div>
</form>

@endsection