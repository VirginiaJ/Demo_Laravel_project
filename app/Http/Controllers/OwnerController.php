<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        return view('clients', ['owners' => \App\Owner::all()]);
    }

    public function show($id)
    {
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
            redirect('/My_first_Laravel_project/clients')->with('status_success', 'New client created!') :
            redirect('/My_first_Laravel_project/clients')->with('status_error', 'New client was not created!');
    }

    public function destroy($id)
    {
        \App\Owner::destroy($id);
        return redirect('/My_first_Laravel_project/clients')->with('status_success', 'Client deleted!');
    }
}
