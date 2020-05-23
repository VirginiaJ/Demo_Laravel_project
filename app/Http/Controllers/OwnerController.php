<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        return view('clients', ['owners' => \App\Owner::all()]);
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
            'surname' => 'required'
        ]);

        $newOwner = new \App\Owner();
        $newOwner->name = $request['name'];
        $newOwner->surname = $request['surname'];
        return ($newOwner->save() !== 1) ?
            redirect('/Demo_Laravel_project/clients')->with('status_success', 'New client created!') :
            redirect('/Demo_Laravel_project/clients')->with('status_error', 'New client was not created!');
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
            redirect('/Demo_Laravel_project/clients/'. $id)->with('status_success', 'Client info updated!') :
            redirect('/Demo_Laravel_project/clients/'. $id)->with('status_error', 'Client info was not updated!');
    }

    public function destroy($id)
    {
        \App\Owner::destroy($id);
        return redirect('/Demo_Laravel_project/clients')->with('status_success', 'Client deleted!');
    }
}
