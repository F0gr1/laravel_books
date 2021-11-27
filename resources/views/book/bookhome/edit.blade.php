@extends('book/layout')
@section('content')
<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $book->name }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <form action="/book/{{ $book->id }}" method="post">
                <div class="form-group">
                    <label for="name">商品名</label>
                   {{ $book->name }}
                </div>
                <div class="form-group">
                    <label for="price">価格</label>
                   {{ $book->price }}
                </div>
                <div class="form-group">
                    <label for="player">ユーザー</label>
                  {{ $book->player }}
                </div>
                <div class="form-group">
                    <label for="player">説明</label>
                  {{ $book->explain }}"
                </div>
                <a href="/book">戻る</a>
            </form>
        </div>
    </div>
</div>
@endsection
