<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
      {
          return view('auth/passwords/change');
      }
      
     public function changePassword(ChangePasswordRequest $request)
     {
          /* ===ここにパスワード変更の処理=== */
          $user = Auth::user();
          $user->password = bcrypt($request->get('password'));
          $user->save();
		 return redirect()->route('home')->with('status', __('Your password has been changed.'));

     }
     public function __construct()
     {
         $this->middleware('auth');
     }
}
