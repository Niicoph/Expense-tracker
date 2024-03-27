<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }
    /**
     * displays the login form
     * @return \Illuminate\Contracts\View\View
     */
    public function register() {
        return view('auth.register');
    }
    /**
     * Store the registration form data
     * @param object $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return redirect()->route('login');
    }
    /**
     * displays the login form
     * @return \Illuminate\Contracts\View\View
     */
    public  function login() {
        return view('auth.login');
    }
    /**
     * To Auntenticate the login  user credentials
     * @param object $request
     * @return \Illuminate\Http\RedirectResponse
     */
    
    public function authenticate(Request $request) {
        $data = $request->validate([
            'email' => 'required|email|max:250',
            'password' => 'required|min:8',
        ]);
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Invalid email or password. Please try again']);
        }
    }
    /**
     * To logout the user
     * @param object $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have been logged out');
    }
}
