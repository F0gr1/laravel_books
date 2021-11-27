@extends('layouts.app')

@section('head')
    <title>{{Auth::user()->name}} Preferences</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{Auth::user()->name}}'s page</div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">ユーザ名</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ Auth::user()->name }}" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" style="float:right;">
                                更新
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection