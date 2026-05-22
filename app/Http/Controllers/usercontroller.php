<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // <-- Importación necesaria para encriptar la contraseña

class usercontroller extends Controller
{
    public function create()
    {
        $careers = Career::all();
        return view('register', compact('careers'));
    }

    public function store(Request $request)
    {
        // 1. Validación de datos
        $request->validate([ 
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'career_id' => 'required|exists:careers,id', 
            'terms_accepted' => 'accepted',
        ]);

      
        User::create([ 
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'career_id' => $request->career_id,
            'terms_accepted' => $request->has('terms_accepted'), 
        ]);

        return redirect()->route('register')->with('success', 'Usuario registrado exitosamente.');
    }
}