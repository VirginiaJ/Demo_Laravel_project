<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'breed' => 'required',
            'age' => 'required'
        ]);

        $newPet = new \App\Pet();
        $newPet->name = $request['name'];
        $newPet->type = $request['type'];
        $newPet->breed = $request['breed'];
        $newPet->age = $request['age'];
        $newPet->owner_id = $request['owner'];
        return ($newPet->save() !== 1) ?
            redirect('/Demo_Laravel_project/clients/'. $request['owner'])->with('status_success', 'New pet was added!') :
            redirect('/Demo_Laravel_project/clients/'. $request['owner'])->with('status_error', 'New pet was not added!');
    }

    public function destroy($id)
    {
        $pet = \App\Pet::find($id);
        \App\Pet::destroy($id);
        return redirect('/Demo_Laravel_project/clients/'. $pet->owner_id)->with('status_success', 'Pet removed!');
    }
}
