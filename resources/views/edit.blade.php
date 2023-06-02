@extends('layouts.app')
@section('title','index')

@section('content')

<div class="container">
    <div class="row">
        <h1>編集フォーム</h1>
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
                <div><label for="attribute">元素</label></div>
                <div class="form-group">
                    @foreach ($attribute_tag as $att)
                    <div class="form-check form-check-inline mb-3">
                        <input class="form-check-input" type="radio" name="attribute_id" id="{{$att['id']}}" value="{{$att['id']}}" {{in_array($att['id'],$include_tags) ? 'checked' : ''}}>
                        {{-- 3項演算子→ if文を1行で各方法{{条件 ? trueだったら : falseだったら}} --}}
                        <label class="form-check-label" for="{{$att['id']}}">{{$att['class']}}</label>
                        {{-- もし$include_tagsにループで回っているタグのidが含まれれば、checkedする --}}
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
                    <input class="form-check-input" type="radio" name="weapon_id" id="{{$wept['id']}}" value="{{$wept['id']}}" {{in_array($wept['id'],$includes_tags) ? 'checked' : ''}}>
                    <label class="form-check-label" for="{{$wept['id']}}">{{$wept['weapon_name']}}</label>
                </div>
                    @endforeach
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