@extends('layouts.app')
@section('title','index')

@section('content')

<div>キャラクター一覧</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>キャラクター名</th>
            <th>属性</th>
            <th>武器</th>
            <th>コメント</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($characters as $character)
        <tr>
            <td>{{$character->id}}</td>
            <td>{{$character->name}}</td>
            <td>{{$character->attribute_id}}</td>
            <td>{{$character->weapon_id}}</td>
        </tr>
    </tbody>
    @endforeach
</table>

@endsection