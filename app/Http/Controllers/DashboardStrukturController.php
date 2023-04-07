<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class DashboardStrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.strukturs.index", [
            "title" => "struktur",
            "strukturs" => Struktur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.strukturs.create");
        
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
            "nama" => "required",
            "nim" => "required",
            "jabatan" => "required",
            "foto" => "image",
            "email" => "required",
            "ket" => "required"

        ]);

        if($request->file("foto")){
            $validatedData["foto"] = $request->file("foto")->store("post-images");
        }
        Struktur::create($validatedData);
        return redirect("/dashboard/strukturs")->with("success", "Data baru telah di tambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function show(Struktur $struktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function edit(Struktur $struktur)
    {
        return view("dashboard.strukturs.edit",[
            "struktur" => $struktur
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Struktur $struktur)
    {
        $validatedData = $request->validate([
            "nama" => "required",
            "nip" => "required",
            "jabatan" => "required",
            "foto" => "image",
            "email" => "required",
            "ket" => "required"

        ]);

        if($request->file("foto")){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData["foto"] = $request->file("foto")->store("post-images");
        }
        Struktur::where("id", $struktur->id)->update($validatedData);
        return redirect("/dashboard/strukturs")->with("success", "Data baru telah di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Struktur $struktur)
    {
        if($struktur->image){
            Storage::delete($struktur->image);
        }
        Struktur::destroy($struktur->id);
        return redirect("/dashboard/strukturs")->with("success", "Struktur telah di hapus");
    }
}
