<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
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
		
		$remember_me = $request->has('remember_me') ? true : false; 
   
        $credentials = $request->only('email', 'password');
		
        if (Auth::attempt($credentials, $remember_me)) {
            return redirect()->intended('todos')
                        ->withSuccess('Signed in successfully!');
        }else{
        
            return redirect('/login')->withErrors('Invalid login!');
        }
        
    }

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        
		$check = $this->create($data);
		
		auth()->login($check);
         
        return redirect("todos")->withSuccess('Signed in successfully!');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function todos()
    {
        if(Auth::check()){
            return view('todos');
        }
  
        return redirect("login")->withErrors('You are not allowed to access!');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login')->withSuccess('You have logged out successfully!');
    }
}