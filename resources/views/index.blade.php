@extends('layouts.app')
@section('title','index')

@section('content')

<h1>TopPage</h1>

<a href="{{ url('/create') }}">登録ページ</a>
<hr>
<table>
    <thead>
        <tr>
            <th>    </th>
            <th>ID</th>
            <th>キャラクター名</th>
            <th>属性</th>
            <th>武器</th>
            {{-- <th>コメント</th> --}}
        </tr>
    </thead>
    
    <tbody>
        @foreach ($characters as $character)
        <div class="card" style="width: 18rem;">
            @if ($character->img_path !=="")
            <img src="{{ Storage::url($character->img_path) }}" width="100%" class="card-img-top" alt="noimage">
            @else
           <img src="{{ Storage::url("noimage.png") }}" width="100%" ></a>
            @endif
            <div class="card-body">
              <h5 class="card-title">{{$character->name}}</h5>
              <p class="card-text">
               <div> {{$character->attribute_id}}</div>
                <div>{{$character->weapon_id}}</div></p>
                <a href="/detail/{{$character->id}}" class="btn btn-primary">Go somewhere</a>
                
            </div>
          </div>


        {{-- <tr>
            <td>{{$character->id}}</td>
            @if ($character->img_path !=="")
            <td><a href="/detail/{{$character->id}}"><img src="{{ Storage::url($character->img_path) }}" width="100" ></a></td>
            @else
            <td><a href="/detail/{{$character->id}}"><img src="{{ Storage::url("noimage.png") }}" width="100" ></a></td>
            @endif
            <td>{{$character->name}}</td>
            <td>{{$character->attribute_id}}</td>
            <td>{{$character->weapon_id}}</td>
            <td><a href="/detail/{{$character->id}}">詳細</a></td>
            <form action="{{ route('delete', ['id'=>$character->id]) }}" method="get">
                @csrf
                <td><a href="/delete/{{$character->id}}">削除</a></td>
            </form>
        </tr> --}}
    </tbody>
    @endforeach
</table>

@endsection