@extends('layouts.app')
@section('content')

<div class="card">
    <h5 class="card-header">{{$owner->name}} {{$owner->surname}}</h5>
    <div class="card-body">
        @if (session('status_success'))
        <div class="alert alert-success">
            {{session('status_success')}}
        </div>
        @elseif (session('status_error'))
        <div class="alert alert-danger">
            {{session('status_error')}}
        </div>
        @endif

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
        @endforeach
        @endif

        <h5 class="card-title">Pets</h5>
        <table class="table table-hover mt-4">
            <thead>
                <th>Name</th>
                <th>Type</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($owner->pets as $pet)
                <tr>
                    <td>{{$pet['name']}}</td>
                    <td>{{$pet['type']}}</td>
                    <td>{{$pet['breed']}}</td>
                    <td>{{$pet['age']}}</td>
                    <td>
                        <form class="d-inline-block" action="{{route('pets.destroy', $pet['id'])}}" method="post">
                            @method('DELETE') @csrf
                            <input class="btn btn-outline-danger" type="submit" value="Remove pet" />
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <form class="d-inline-block" action="{{route('clients.show.pet', $owner['id'])}}" method="post">
            @csrf
            <input type="hidden" name="addPet">
            <input class="btn btn-outline-primary" type="submit" value="Add pet" />
        </form>
        <form class="d-inline-block" action="{{route('clients.show.update', $owner['id'])}}" method="post">
            @csrf
            <input type="hidden" name="updateClient">
            <input class="btn btn-outline-primary" type="submit" value="Edit client info" />
        </form>
        <form class="d-inline-block" action="{{route('clients.destroy', $owner['id'])}}" method="post">
            @method('DELETE') @csrf
            <input class="btn btn-outline-danger" type="submit" value="Delete" />
        </form>
    </div>
</div>

@endsection