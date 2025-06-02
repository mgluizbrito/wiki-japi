<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialist;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        return view('Entrar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $userData = $request->only(['name', 'email', 'password', 'role']);
        $userData['password'] = Hash::make($userData['password']);
        $userData['email'] = trim(strtolower($userData['email']));

        $createdUser = User::create($userData);
        
        if ($userData['role'] == 'specialist'){

            Specialist::create([
                'user_id' => $createdUser->id,
                'lattes_url' => $request->input('lattes'),
                'area' => $request->input('area'),
            ]);
        }; 

        return redirect(route('auth.entrar'))->with('success', 'User created successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('home'));
    }

    /**
     * Login authentication
     * @param Request $request
     */
    public function loginAuth(Request $request){

        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
        ]);

        $credentials['email'] = trim(strtolower($credentials['email']));
        $credentials['password'] = trim($credentials['password']);

        if (Auth::attempt($credentials)) return redirect(route('portal'));
        
        return back()->withErrors([
            'login' => 'Usuário ou senha inválidos',
        ])->onlyInput('email');
    }
}
