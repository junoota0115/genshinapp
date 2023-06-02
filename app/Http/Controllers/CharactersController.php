<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CharacterRequest;
use App\Models\Character;
use App\Models\weapon;
use App\Models\Attribute;

class CharactersController extends Controller
{
//=====一覧画面表示=====
    public function index(){
        $query = Character::query();
        $characters = $query->get();
        $attribute = Attribute::orderBy('id','ASC')
        ->get();
        $weapon_tag = Weapon::orderBy('id','ASC')
        ->get();

        return view('index', compact('characters', 'weapon_tag','attribute'));

    }
    // public function index(){
    //     // $search = $request->input('search');
    //     $query = Character::query();

    //     // if(!empty($search)) {
    //     //     $query->where('name', 'LIKE', "%{$search}%");
    //     // }
    //     $characters = $query->get();
    //     $attribute = Attribute::orderBy('id','ASC')
    //     ->get();
    //     $weapon_tag = Weapon::orderBy('id','ASC')
    //     ->get();

    //     return view('index', compact('characters', 'weapon_tag','attribute'));

    // }
//=====一覧画面表示=====


//=====追加機能=====
    public function create(){
        $attribute_tag = Attribute::orderBy('id','ASC')
        ->get();
        $weapon_tag = weapon::orderBy('id','ASC')
        ->get();
        return view('create',compact('attribute_tag','weapon_tag'));

    }

   public function upload(CharacterRequest $request){
    $model = new Character();
    $model -> exeUpload($request);
    return redirect(route('index'));
   }
//=====追加機能=====


//=====詳細画面表示=====

   public function detail($id){
    $model = new Character();
    $character = $model-> showDetail($id);
    $attribute_tag = Attribute::where('id','=',$character['attribute_id'])
    ->first();
    $weapon_tag = Weapon::where('id','=',$character['weapon_id'])
    ->first(); //get()で渡すと複数のデータとしてlaravelが判断。単体のデータを表記するとエラーになる。foreachもしくはfirst()で解消できる

    return view('detail',compact('character','weapon_tag','attribute_tag'));
   }
//=====詳細画面表示=====


//=====削除機能=====
   public function delete($id){
    $model = new Character();
    $model-> exeDelete($id);
    return redirect(route('index'));
   }
//=====削除機能=====


//=====編集機能=====
   public function edit($id){
    $model = new Character();
    $character = $model-> showEdit($id);
    $attribute_tag = Attribute::orderBy('id','ASC')
    ->get();

    $weapon_tag = weapon::orderBy('id','ASC')
    ->get();

    $edit_character = Character::select('characters.*','attributes.id AS attributes_id')
    //charactersのデータすべてとattributesのidをattributes_idという名前で取得
    
    ->leftJoin('attributes','attributes.id','=','characters.attribute_id')
    //charactersテーブルに、attributesテーブルのidとcharactersテーブルのattribute_idが一致するようにattributesテーブルをくっつける
    
    ->where('characters.id','=', $id)
    //charactersテーブルのidとURLのidが一致するもの
    ->get();

    $include_tags = [];
    //取得したデータを配列に入れる

    foreach($edit_character as $edit_chara){
        array_push($include_tags,$edit_chara['attributes_id']);
        //$include_tagsにattributes_idを入れる
    }
    $edit_weapon = Character::select('characters.*','weapons.id AS weapons_id')
    //charactersのデータすべてとattributesのidをattributes_idという名前で取得
    
    ->leftJoin('weapons','weapons.id','=','characters.weapon_id')
    //charactersテーブルに、attributesテーブルのidとcharactersテーブルのattribute_idが一致するようにattributesテーブルをくっつける
    
    ->where('characters.id','=', $id)
    //charactersテーブルのidとURLのidが一致するもの
    ->get();
    $includes_tags = [];
    foreach($edit_weapon as $edit_wpn){
        array_push($includes_tags,$edit_wpn['weapons_id']);
        //$include_tagsにattributes_idを入れる
    }

    return view('edit',compact('character','attribute_tag','weapon_tag','include_tags','includes_tags'));
   }

   public function update(CharacterRequest $request){
    $model = new Character();
    $model-> exeUpdate($request);
    return redirect(route('index'));
   }

//=====編集機能=====

//=====非同期検索機能=====
public function search(Request $request){
    //$searchの中に、送られてきたsearch内に記述したデータを入れる
    $search = $request->input('search');
    //$queryにCharacterテーブルの情報を入れる
    $query = Character::query();

    //もし$searchに何かしらデータがあれば、Characterテーブルのnameカラムで条件検索して該当するものを取得
    if(!empty($search)){
        $query->where('name','like',$search);
    }

    //$queryのデータを取得して変数に代入
    $characters = $query->get();
    //取得した$charactersのデータをjsonデータとして返す
    return response()->json($characters);
}
//=====非同期検索機能=====

//=====非同期削除機能=====
public function destroy(Request $request){
    $dB_data = new Character;
    $dB_data->destroy($request->id);
    return response()->json(['result'=>'成功']);
}
//=====非同期削除機能=====

}
