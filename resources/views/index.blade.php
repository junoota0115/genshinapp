@extends('layouts.app')
@section('title','index')

@section('content')

<h1>TopPage</h1>
<div>
    <form class="inline my-2 my-lg-0 ml-2" id="serch_text">
      <div class="form-group">
        <input type="search" class="" name="search" id="search" value="{{request('search')}}" placeholder="キャラクター検索" aria-label="検索...">
      </div>
      <button type="button" id="button" class="btn btn-info">検索</button>
    </form>
  </div>

<a href="{{ url('/create') }}" class="btn btn-secondary">登録ページ</a>
<hr>
@if(session('message'))
<div class="alert alert-success" style="width: 30rem;">{{session('message')}}</div>
@endif
<div class="top-character">
<div class="card-group">
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
              @foreach ($attribute as $attributes)
              @if($character->attribute_id==$attributes->id)
              <div> {{$attributes->class}}</div>
              @endif
              @endforeach

              @foreach ($weapon_tag as $wpt)
              @if ($wpt->id ==$character->weapon_id)
               <div>{{$wpt->weapon_name}}</div></p>
               @endif
               @endforeach
                 
               <a href="/detail/{{$character->id}}" class="btn btn-primary">Go show page</a>
               <form class="id">
               <input type="submit" class="btn btn-danger" character_id="{{$character->id}}" value="delete">
               {{-- ボタンにidを指定して、クリックした際にIDを取得するようにする --}}         
              </form>
              </div>
            </div>
    @endforeach
</div>
</div>


@endsection
<script src="{{ asset ('js/alart.js') }} "defer></script>