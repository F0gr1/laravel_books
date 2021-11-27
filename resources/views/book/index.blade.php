@extends('layouts.app')

@section('head')
  <link rel="stylesheet" href="{{asset('css/index.css')}}">
  <title>MainPage</title>
@endsection

@section('content')
  <!--
  <nav class="navbar navbar-expand-lg navbar-light bg-light p-lg-2">
    <a href="book/create" class="btn btn-outline-primary w-auto mr-lg-4" id="create-button"> NEW </a>
    <button class="navbar-toggler mx-5 w-auto h-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item h-auto w-auto">
          <a class="nav-link" href="#">MENU ITEM1</a>
        </li>
        <li class="nav-item h-auto w-auto">
          <a class="nav-link" href="#">MENU ITEM2</a>
        </li>
        <li class="nav-item h-auto w-auto">
          <a class="nav-link" href="#">MENU ITEM3</a>
        </li>
      </ul>
    </div>
  </nav>
  -->
  <div class="container ops-main w-auto h-auto">
    <div class="row ops-title">
      <div class="col-8 my-auto">
        <h2 class="ops-title">商品一覧</h2>
      </div>
      <div class="col-4 my-auto">
        <a href="book/create" class="btn btn-outline-primary w-auto mr-lg-4" id="create-button"> NEW </a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 mt-2">
        <div class="float-right">

          <form class="form-inline" action="{{url('/book')}}" method="GET">
            @csrf
            <div class="form-group　pr-3">
              <p> 商品名<input class="form-control" type="text" name='name' value='{{$name}}'></p>
            </div>

            <div class="form-group pr-3">
              <p> タグ<input class="form-control" type="text" name='tag' value='{{$tag}}'></p>
            </div>

            <div class="form-group">
              <p><input class="form-control" type="submit" value="検索"></p>
            </div>

          </form>

        </div>
      </div>
    </div>

    @include('layouts.table', ['books' => $books, 'is_index'=>true])

    <div class="row pagination">
      <div class="mx-auto">
        {{ $books-> oneachSide(1) ->links('vendor.pagination.simple-bootstrap-4') }}
      </div>
    </div>

  </div>
@endsection
