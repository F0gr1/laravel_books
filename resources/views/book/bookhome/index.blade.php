@extends('layouts.app')

@section('head')
  <title>{{$book->name}}:Nova-tech</title>
  <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection


@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header text-center">
        <span class="item-name">{{$book->name}}</span>
      </div>
      <div class="card-body">
        <div class="content" id="item-price">
          価格： {{ $book->price }}
        </div>
        <div class="content" id="item-user">
          登録者： <a href="/user/{{ $book->userid }}"> {{ $book->player }} </a>
        </div>
        <div class="content" id="title-explain">
          商品説明
        </div>
        <div class="content-end" id="item-explain">
          {{ $book->explain }}
        </div>
        <div class="gray" id="updated-at">
          <i>Last update:  {{ $book->updated_at }}</i>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
