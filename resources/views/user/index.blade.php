@extends('layouts.app')

@section('head')
    <title>{{Auth::user()->name}}'s page</title>
    <link rel="stylesheet" href="{{asset('css/mypage.css')}}"
@endsection

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{$user -> name}}'s Page
                    </div>
                    <div class="card-body">
                        <div class="group-name group">
                            <span class="name-title title">
                                ユーザ名:
                            </span>
                            <span class="user-name">
                                {{$user -> name}}
                            </span>
                        </div>
                        @if($user -> id == $auth -> id)
                            <div class="group group-mail">
                                <span class="mail-title title">
                                    メールアドレス:
                                </span>
                                <span class="user-mail">
                                    {{$user -> email}}
                                </span>
                            </div>
                        @endif

                        <div class="card-header text-center" id="table-title">
                            <b>{{ $user->name }} さんの登録商品</b>
                        </div>
                        @include('layouts.table', ['books' => $books, 'is_index'=>false])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection