<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctors', ['doctors' => \App\Doctor::orderBy('surname')->get()]);
    }

    public function show($id)
    {
        return view('doctor', ['doctor' => \App\Doctor::find($id)]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required|unique:doctors,phone',
            'email' => 'required|unique:doctors,email'
        ]);

        $newDoctor = new \App\Doctor();
        $newDoctor->name = $request['name'];
        $newDoctor->surname = $request['surname'];
        $newDoctor->phone = $request['phone'];
        $newDoctor->email = $request['email'];
        return ($newDoctor->save() !== 1) ?
            redirect()->route('doctors.index')->with('status_success', 'New doctor created!') :
            redirect()->route('doctors.index')->with('status_error', 'New doctor was not created!');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        $updatedDoctor = \App\Doctor::find($id);
        $updatedDoctor->name = $request['name'];
        $updatedDoctor->surname = $request['surname'];
        $updatedDoctor->phone = $request['phone'];
        $updatedDoctor->email = $request['email'];
        return ($updatedDoctor->save() !== 1) ?
            redirect()->route('doctors.index')->with('status_success', 'Doctor info updated!') :
            redirect()->route('doctors.index')->with('status_error', 'Doctor info was not updated!');
    }

    public function destroy($id)
    {
        \App\Doctor::destroy($id);
        return redirect()->route('doctors.index')->with('status_success', 'Doctor deleted!');
    }
}
