<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request['today'])) {
            $date = date("Y-m-d");
            $date_time1 = $date . " 00:00:00";
            $date_time2 = $date . " 23:59:59";
            return view('appointments', ['appointments' => \App\Appointment::whereBetween('date_time', [$date_time1, $date_time2])->orderby('date_time')->get()]);
        } elseif (isset($request['thisWeek'])) {
            $firstday = date('Y-m-d', strtotime("this week")) . " 00:00:00";
            $lastday = date('Y-m-d', strtotime("this week +6 days")) . " 23:59:59";
            return view('appointments', ['appointments' => \App\Appointment::whereBetween('date_time', [$firstday, $lastday])->orderby('date_time')->get()]);
        } elseif (isset($request['doctor_id'])) {
            return view('appointments', ['appointments' => \App\Appointment::where('doctor_id', $request['doctor_id'])->orderby('date_time')->get()]);
        } else
            return view('appointments', ['appointments' => \App\Appointment::orderby('date_time')->get()]);
    }

    public function show($id)
    {
        return view('appointment', ['appointment' => \App\Appointment::find($id)]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'doctor_id' => 'required',
            'owner_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required'
        ]);

        $updatedAppointment = new \App\Appointment();
        $updatedAppointment->doctor_id = $request['doctor_id'];
        $updatedAppointment->owner_id = $request['owner_id'];
        $updatedAppointment->description = $request['description'];
        $updatedAppointment->date_time = $request['date'] . " " . $request['time'];
        return ($updatedAppointment->save() !== 1) ?
            redirect()->route('appointments.index')->with('status_success', 'New appointment created!') :
            redirect()->route('appointments.index')->with('status_error', 'New appointment was not created!');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'doctor_id' => 'required',
            'owner_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required'
        ]);

        $updatedAppointment = \App\Appointment::find($id);
        $updatedAppointment->doctor_id = $request['doctor_id'];
        $updatedAppointment->owner_id = $request['owner_id'];
        $updatedAppointment->description = $request['description'];
        $updatedAppointment->date_time = $request['date'] . " " . $request['time'];
        return ($updatedAppointment->save() !== 1) ?
            redirect()->route('appointments.index')->with('status_success', 'Appointment updated!') :
            redirect()->route('appointments.index')->with('status_error', 'Appointment was not updated!');
    }

    public function destroy($id)
    {
        \App\Appointment::destroy($id);
        return redirect()->route('appointments.index')->with('status_success', 'Appointment deleted!');
    }
}
