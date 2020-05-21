<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetController extends Controller
{
    public function store(Request $request)
    {
        var_dump($request);
        // $this->validate($request, [
        //     'name' => 'required',
        //     'type' => 'required',
        //     'breed' => 'required',
        //     'age' => 'required'
        // ]);

        // $newPet = new \App\Pet();
        // $newPet->name = $request['name'];
        // $newPet->type = $request['type'];
        // $newPet->breed = $request['breed'];
        // $newPet->age = $request['age'];
        // $newPet->owner_id = $request['id'];
        // return ($newPet->save() !== 1) ?
        //     redirect('/My_first_Laravel_project/clients')->with('status_success', 'New pet was added!') :
        //     redirect('/My_first_Laravel_project/clients')->with('status_error', 'New pet was not added!');
    }
}
