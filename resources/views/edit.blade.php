@extends('layouts.app')
@section('title','index')

@section('content')

<div class="container">
    <div class="row">
        <h1>登録フォーム</h1>
        <form action="{{route('update')}}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" id="id" name="id" value="{{$character->id}}">

            <div class="form-group">
                <label for="name">キャラクター</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$character->name}}">
                @if($errors->has('name'))
                <p>{{$errors->first('name')}}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="attribute_id">属性</label>
                <select name="attribute_id" class="form-control" id="attribute_id"  placeholder="Attribute" value="{{$character->attribute_id}}">
                    <option value=""></option>
                    <option value="1">風</option>
                    <option value="2">炎</option>
                    <option value="3">水</option>
                    <option value="4">雷</option>
                    <option value="5">氷</option>
                    <option value="6">岩</option>
                    <option value="7">草</option>
                </select>
                @if($errors->has('attribute_id'))
                <p>{{$errors->first('attribute_id')}}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="weapon">武器</label>
                <select name="weapon_id" class="form-control" id="weapon_id"  placeholder="Weapon" value="{{$character->weapon_id}}">
                    <option value=""></option>
                    <option value="1">片手剣</option>
                    <option value="2">大剣</option>
                    <option value="3">長柄</option>
                    <option value="4">法器</option>
                    <option value="5">弓</option>
                </select>
                @if($errors->has('weapon_id'))
                <p>{{$errors->first('weapon_id')}}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="comment">コメント</label>
                <textarea class="form-control" id="comment" name="comment" placeholder="Comment" >{{old("comment",$character->comment)}}</textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="img_path">画像添付</label>
                <div><input type="file" id="img_path" name="img_path" ></div>
            </div>
            <br>
            <button type="submit" class="btn btn-default">更新</button>
        </form>
    </div>
</div>
@endsection