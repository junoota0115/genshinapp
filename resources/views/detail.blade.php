@extends('layouts.app')
@section('title','index')

@section('content')


<h1>詳細表示</h1>
<div>
    @if ($character->img_path !==NULL)
    <img src="{{ Storage::url($character->img_path) }}" width="700"  >
    @else
   <img src="{{ Storage::url("noimage.png") }}" width="700" alt="noimage"></a>
    @endif
</div>

<div>
名前：
{{$character->name}}
</div>

<div>
属性：
{{$character->attribute_id}}
</div>

<div>
武器：
{{$character->weapon_id}}
</div>

<div>
コメント：
{{$character->comment}}
</div>

<a href="/edit/{{$character->id}}">編集</a>
<a href="/delete/{{$character->id}}">削除</a>

@endsection
