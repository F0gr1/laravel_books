<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
class RenameController extends Controller
{
    public function index()
    {
    	abort(404);
    }
    public function edit($id)
    {
	$user = User::findOrFail($id);
	$auth = Auth::user();	
	return view('rename/edit' , compact('user', 'auth'));  
    }
    public function update(Request $request , $id)
    {
	$user = User::findOrFail($id);
	$iname = $request->input('name');
//	$ipas = $request->input('pass');
	$user->name = $request->name;
//	$user->password = $request->password;
	$user->save();
   	return redirect("/book");
    } 
}
