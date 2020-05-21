@extends('layouts.app')
@section('content')

<form action="{{route('clients.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Client name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
    </div>
    <div class="form-group">
        <label for="surname">Client surname</label>
        <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" required>
    </div>
    <button type="submit" class="btn btn-outline-primary">Add</button>
</form>

@endsection