<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use bcrypt;

class CustomAuthController extends Controller
{
    public function index()
    {  
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
    	
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

   public function registration(Request $request)
   { 
      $user = new User();
$user->password = bcrypt('12345');
$user->email = 'sameer.k@chapter247.com';
$user->full_name = 'Sameer Khan';
$user->save();
   }
}
