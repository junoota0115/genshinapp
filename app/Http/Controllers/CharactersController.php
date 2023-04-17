<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharactersController extends Controller
{
    //
    public function index(){
        $model = new Character();
        $characters = $model->showIndex();

        return view('index',['characters'=>$characters]);
    }

    public function create(){
        return view('create');
    }
}
