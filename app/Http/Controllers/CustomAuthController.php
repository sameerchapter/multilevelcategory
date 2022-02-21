<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use bcrypt;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

   public function adduser(Request $request)
    { 
   //  $user=User::find(3);
   //  dd($user->assignRole($request->input('supadmin')));
   // $role = Role::create(['name' => 'supadmin']);
   //$roles=Role::all();
   // $permission = Permission::create(['guard_name' => 'web', 'name' => 'all']);
//$role[0]->syncPermissions('all');
   // $permission = Permission::get();

     // dd($roles[0]->syncPermissions('all'));
      $user = new User();
      $user->password = 123456;
      $user->email = 'test.k@chapter247.com';
      $user->full_name = 'Sameer Khan';
      $user->save();
   }
}
