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
{{$attribute_tag->class}}
</div>

<div>
武器：
{{$weapon_tag->weapon_name}}
</div>

<div>
コメント：
{{$character->comment}}
</div>

<a href="/edit/{{$character->id}}" class="btn btn-primary">編集</a>


<form action="{{route('delete',$character->id)}}" method="post">
    @csrf
<input type="submit" value="削除します" class="btn btn-danger" onclick='return confirm("本当に削除しますか？")'>


@endsection


