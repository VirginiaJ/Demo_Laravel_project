@extends('layouts.app')
@section('content')

<form action="{{route('pets.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Pet name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
    </div>
    <div class="form-group">
        <label for="type">Pet type</label>
        <input type="text" class="form-control" name="type" id="type" placeholder="Type" required>
    </div>
    <div class="form-group">
        <label for="type">Pet breed</label>
        <input type="text" class="form-control" name="breed" id="breed" placeholder="Breed" required>
    </div>
    <div class="form-group">
        <label for="type">Pet age</label>
        <input type="number" class="form-control" name="age" id="age" placeholder="Age" required>
    </div>
    <input type="hidden" >
    <button type="submit" class="btn btn-outline-primary">Add</button>
</form>

@endsection