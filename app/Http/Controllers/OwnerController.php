<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        return view('clients', ['owners' => \App\Owner::orderBy('surname')->get()]);
    }

    public function show($id, Request $request)
    {
        if (isset($request['addPet'])) {
            return view('newPet', ['owner' => \App\Owner::find($id)]);
        } elseif (isset($request['updateClient'])) {
            return view('updateClient', ['owner' => \App\Owner::find($id)]);
        } else
            return view('client', ['owner' => \App\Owner::find($id)]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'petName' => 'required',
            'type' => 'required',
            'breed' => 'required',
            'age' => 'required'
        ]);

        $newClient = new \App\Owner();
        $newClient->name = $request['name'];
        $newClient->surname = $request['surname'];
        $newClient->save();
        $newOwner = \App\Owner::find($newClient['id']);
        $newPet = new \App\Pet();
        $newPet->name = $request['petName'];
        $newPet->type = $request['type'];
        $newPet->breed = $request['breed'];
        $newPet->age = $request['age'];
        $newPet->owner_id = $newOwner->id;
        return ($newPet->save() !== 1) ?
            redirect()->route('clients.index')->with('status_success', 'New client created!') :
            redirect()->route('clients.index')->with('status_error', 'New client was not created!');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required'
        ]);

        $updatedOwner = \App\Owner::find($id);
        $updatedOwner->name = $request['name'];
        $updatedOwner->surname = $request['surname'];
        return ($updatedOwner->save() !== 1) ?
            redirect()->route('clients.show', $id)->with('status_success', 'Client info updated!') :
            redirect()->route('clients.show', $id)->with('status_error', 'Client info was not updated!');
    }

    public function destroy($id)
    {
        \App\Owner::destroy($id);
        return redirect()->route('clients.index')->with('status_success', 'Client deleted!');
    }
}
