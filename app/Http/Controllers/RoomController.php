<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index(){


    }


    public function create(){


    }



    public function store(Request $request){
        $request->validate([
            "name" => "required|unique:rooms,title"
        ]);

        Room::create([
            "title"=> $request->name,
            "description" => $request->description,
            "owner_id" => auth()->user()->id,
        ]) ;
       
    }


    public function update(){


    }


    public function destroy(){

    }
}
