@extends('layouts.app')

@section('head')

<head>
    <title>{{$user->name}}'s preference</title>
	<link rel="stylesheet" href="{{asset('css/mypage.css')}}"
</head>
@endsection

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        ニックネーム変更
                    </div>
                    <div class="card-body">
                        <div class="group-name group">
                            <span class="name-title title">
                               現在のユーザ名:
                            </span>
                            <span class="user-name">
                                {{$user -> name}}
                            </span>
                        </div>
                        <form action="/rename/{{Auth::user()->id }}/ " method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            ユーザ名 <input type="text" name ="name" value = ''>
                            <!--- パスワード <input type="password" name ="password" value = ''> --->
                            <button class="btn btn-success" type = "submit">変更</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

