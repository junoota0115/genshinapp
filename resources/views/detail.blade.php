@extends('layouts.app')
@section('title','index')

@section('content')


<h1>詳細表示</h1>
<div>
<img src="{{ Storage::url($character->img_path) }}" width="400">
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

@endsection
