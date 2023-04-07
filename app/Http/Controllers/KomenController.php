<?php

namespace App\Http\Controllers;

use App\Models\Komen;
use Illuminate\Http\Request;

class KomenController extends Controller
{
    public function komen(Request $request){
        $validatedData = $request->validate([
            "nama" => "required",
            "komen" => "required"
        ]);

        Komen::create($validatedData);
        return redirect("/#komen");
    }

    public function index()
    {
        return view("dashboard.komens.index", [
            "komens" => Komen::all()
        ]);
    }
    
    public function destroy(Komen $komen)
    {

        Komen::destroy($komen->id);
        return redirect("/dashboard/komens")->with("success", "Komen telah di hapus");
    }

}
