<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CharacterRequest;
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

   public function upload(CharacterRequest $request){
    $model = new Character();
    $model -> exeUpload($request);
    return redirect(route('index'));
   }

   public function detail($id){
    $model = new Character();
    $character = $model-> showDetail($id);
    return view('detail',['character'=>$character]);

   }
   public function delete($id){
    $model = new Character();
    $model-> exeDelete($id);
    return redirect(route('index'));

   }

   public function edit($id){
    $model = new Character();
    $character = $model-> showEdit($id);
    return view('edit',['character'=>$character]);
   }

   public function update(CharacterRequest $request){
    $model = new Character();
    $model-> exeUpdate($request);
    return redirect(route('index'));
   }


}
