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
       <div><label for="attribute">元素</label></div>
        @foreach ($attribute_tag as $att)
        <div class="form-check form-check-inline mb-3">
            <input class="form-check-input" type="radio" name="attribute_id" id="{{$att['class']}}" value="{{$att['id']}}" >
            <label class="form-check-label" for="{{$att['class']}}">{{$att['class']}}</label>
        </div>
            @endforeach
            @if($errors->has('attribute_id'))
            <p>{{$errors->first('attribute_id')}}</p>
            @endif
      </div>

            <div class="form-group">
                <div><label for="weapon">武器</label></div>
                @foreach ($weapon_tag as $wept)
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="radio" name="weapon_id" id="{{$wept['weapon_name']}}" value="{{$wept['id']}}">
                    <label class="form-check-label" for="{{$wept['weapon_name']}}">{{$wept['weapon_name']}}</label>
                </div>
                    @endforeach

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