@extends('layouts.app')
@section('content')

<div class="card">
    <h5 class="card-header">{{$owner->name}} {{$owner->surname}}</h5>
    <div class="card-body">
        <h5 class="card-title">Pets</h5>
        <table class="table table-hover mt-4">
            <thead>
                <th>Name</th>
                <th>Type</th>
                <th>Breed</th>
                <th>Age</th>
            </thead>
            <tbody>
                @foreach ($owner->pets as $pet)
                <tr>
                    <td>{{$pet['name']}}</td>
                    <td>{{$pet['type']}}</td>
                    <td>{{$pet['breed']}}</td>
                    <td>{{$pet['age']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

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
            <input type="hidden" name="owner" value="{{$owner->id}}">
            <button type="submit" class="btn btn-outline-primary">Add pet</button>
        </form>
    </div>
</div>

@endsection