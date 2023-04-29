@extends('layouts.app')
@section('title','index')

@section('content')

<div class="container">
    <div class="row">
        <h1>登録フォーム</h1>
        <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">キャラクター</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                @if($errors->has('name'))
                <p>{{$errors->first('name')}}</p>
                @endif
            </div>

            <!--  カテゴリープルダウン -->
      <div class="form-group">
        <label for="attribute">{{ __('カテゴリー') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
        <select class="form-control" id="attribute" name="attribute">
            @foreach(config('attribute') as $attribute_id => $class)
            <option value="{{ $attribute_id }}" {{ old('attribute_id') === $attribute_id ? "selected" : ""}}>{{ $class }}</option>
          @endforeach
        </select>
      </div>

            <div class="form-group">
                <label for="weapon">武器</label>
                <select name="weapon_id" class="form-control" id="weapon_id"  placeholder="Weapon">
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
                <textarea class="form-control" id="comment" name="comment" placeholder="Comment"></textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="img_path">画像添付</label>
                <div><input type="file" id="img_path" name="img_path"></div>
            </div>
            <br>
            <button type="submit" class="btn btn-default">送信</button>
        </form>
    </div>
</div>
@endsection