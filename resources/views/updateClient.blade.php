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

        <form action="{{route('clients.update', $owner['id'])}}" method="post">
            @method('PUT') @csrf
            <div class="form-group">
                <label for="name">Client name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$owner->name}}">
            </div>
            <div class="form-group">
                <label for="surname">Client surname</label>
                <input type="text" class="form-control" name="surname" id="surname" value="{{$owner->surname}}">
            </div>
            <button type="submit" class="btn btn-outline-primary">Save</button>
        </form>

    </div>
</div>

@endsection