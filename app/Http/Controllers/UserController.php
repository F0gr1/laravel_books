<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Book;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        echo "<script>alert('To show user\'s page, you need to set user ID on URL.');</script>";
        return App::abort(404);
    }

    public function show($id){
        $auth = Auth::user();
        $user = User::findOrFail($id);
        $books = DB::table('books')->where('userid', $id)->get();
        return view('user.index', ['user'=>$user, 'auth'=>$auth, 'books'=>$books]);
    }
}
