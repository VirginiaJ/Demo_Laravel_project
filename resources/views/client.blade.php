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
        <button class="btn btn-outline-primary">
            <a href="{{route('newPet')}}">Add pet</a></button>
        <form class="d-inline-block" action="{{route('clients.update', $owner['id'])}}" method="post">
            @method('PUT') @csrf
            <input class="btn btn-outline-primary" type="submit" value="Edit info" />
        </form>
        <form class="d-inline-block" action="{{route('clients.destroy', $owner['id'])}}" method="post">
            @method('DELETE') @csrf
            <input class="btn btn-outline-danger" type="submit" value="delete" />
        </form>
    </div>
</div>

@endsection