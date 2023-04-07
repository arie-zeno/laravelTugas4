<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view("register.index", [
            "title" => "register"
        ]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            "user" => ["required", "min:3", "max:255", "unique:users"],
            "password" => "required|min:3|max:255"
        ]);
        
        // dd($validatedData);
        $validatedData["password"] = Hash::make($validatedData["password"]);

        User::create($validatedData);
        $request->session()->flash("success", "Registrasi Berhasil, Silahkan Login"); 
        return redirect("/login");
    }
}
