<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Foto;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.fotos.index", [
            "fotos" => Foto::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.fotos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "caption" => "required|max:255",
            "foto" => "image"
        ]);

        if($request->file("foto")){
            $validatedData["foto"] = $request->file("foto")->store("post-images");
        }
        Foto::create($validatedData);
        return redirect("/dashboard/fotos")->with("success", "Foto baru telah di tambahkan");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view("dashboard.fotos.show", [
        //     "foto" => $id
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        return view("dashboard.fotos.edit",[
            "foto" => $foto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        $validatedData = $request->validate([
            "caption" => "required|max:255",
            "foto" => "image"
        ]);

        if($request->file("foto")){
            $validatedData["foto"] = $request->file("foto")->store("post-images");
        }
        Foto::where("id", $foto->id)->update($validatedData);
        return redirect("/dashboard/fotos")->with("success", "Foto baru telah di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        if($foto->foto){
            Storage::delete($foto->foto);
        }
        Foto::destroy($foto->id);
        return redirect("/dashboard/fotos")->with("success", "Foto telah di hapus");
    }
}
