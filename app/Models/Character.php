<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CharacterRequest;

class Character extends Model
{
    protected $table = 'characters';
    protected $fillable = [
        'img_path',
        'name',
        'attribute',
        'weapon_id',
        'comment',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
    
    // use HasFactory;
    public function showIndex(){
        $characters = Character::all();
        return $characters;
    }

    public function exeUpload(CharacterRequest $request){
        $inputs = $request->all();
        // dd($inputs);
        if(isset($inputs['img_path'])){
        $file = $request->file('img_path');
        $extension = $file->getClientOriginalName();
        $inputs['img_path'] = $extension;
        $file->move('storage',$extension);
    }
        DB::beginTransaction();
        try{
            Character::create($inputs);
            DB::commit();
        }catch(\Throwable $e){
            $error_code = $e->getMessage();
            // dd($error_code);
            DB::rollback();
            abort(500);
        }
        $request->session()->flash('message', 'キャラクターを追加しました');
        // return redirect()->route('text.index');
    }

    public function showDetail($id){
        $character = Character::find($id);
        return $character;
    }

    public function exeDelete($id){
        $character = Character::find($id);
        $character->delete();
        return $character;
    }

    
    public function showEdit($id){
        $character = Character::find($id);
        return $character;
    }

    public function exeUpdate(CharacterRequest $request){
        $inputs = $request->all();
        // dd($inputs);
        if(isset($inputs['img_path'])){
            $file = $request->file('img_path');
            $extension = $file->getClientOriginalName();
            $inputs['img_path'] = $extension;
            $file->move('storage',$extension);
        }
        DB::beginTransaction();
        try{
        $character = Character::find($inputs['id']);
        $character -> fill([
            'name'=>$inputs['name'],
            'attribute_id'=>$inputs['attribute_id'],
            'weapon_id'=>$inputs['weapon_id'],
            'comment'=>$inputs['comment'],
            'img_path'=>$inputs['img_path'],
        ]);
    
            $character->save();
            DB::commit();
        }catch(\Throwable $e){
            $error_code = $e->getMessage();
            dd($error_code);
            DB::rollback();
            abort(500);
        }
        // Session::flash('err_msg','登録しました');
        $request->session()->flash('message', 'キャラクターを更新しました');
    }

  
}
