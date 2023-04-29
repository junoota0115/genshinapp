@extends('layouts.app')
@section('title','index')

@section('content')

<h1>TopPage</h1>
<div>
    <form action="{{ route('index') }}" method="GET">
      <input type="text" name="search" value="{{ $search }}">
      <input type="submit" value="検索">
    </form>
  </div>

<a href="{{ url('/create') }}">登録ページ</a>
<hr>
@if(session('message'))
<div class="alert alert-success" style="width: 30rem;">{{session('message')}}</div>
@endif
        @foreach ($characters as $character)
        <div class="card" style="width: 18rem;">
            @if ($character->img_path !==NULL)
            <img src="{{ Storage::url($character->img_path) }}" width="100%" class="card-img-top" alt="noimage">
            @else
           <img src="{{ Storage::url("noimage.png") }}" width="100%" ></a>
            @endif
            <div class="card-body">
              <h5 class="card-title">{{$character->name}}</h5>
              <p class="card-text">
               <div> {{$character->attribute}}</div>
                <div>{{$character->weapon_id}}</div></p>
                <a href="/detail/{{$character->id}}" class="btn btn-primary">Go somewhere</a>
                
            </div>
          </div>

    @endforeach


@endsection