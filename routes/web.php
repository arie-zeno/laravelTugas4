<?php

use App\Models\Foto;
use App\Models\Post;
use App\Models\Category;
use App\Models\Struktur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardStrukturController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [PostController::class, "home"]);
Route::get('/berita', [PostController::class, "index"]);
Route::post("/",[KomenController::class, "komen"]);


Route::get('/galeri', function () {
    return view("galeri",[
        "title" => "galeri",
        "fotos" => Foto::all()
    ]);
});

Route::get('/kegiatan', function () {
    return view('kegiatan', [
        "title" => "kegiatan"
    ]);
});

// single Post
Route::get('/berita/{post:slug}', [PostController::class, "show"]);
Route::get('/categories/{category:slug}', function(Category $category){
    return view("category", [
        "title" => $category->slug,
        "posts" => $category->posts->load("category")
    ]);
});

Route::get('/login', [LoginController::class, "index"])->name("login")->middleware("guest");
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"]);

Route::get('/register', [RegisterController::class, "index"]);
Route::post('/register', [RegisterController::class, "store"]);

Route::get("/dashboard", function(){
    return view("dashboard.index");
})->middleware("auth");

Route::get("/dashboard/posts/checkSlug", [DashboardPostController::class, "checkSlug"])->middleware("auth");
Route::resource("/dashboard/posts", DashboardPostController::class)->middleware("auth");
Route::resource("/dashboard/fotos", FotoController::class)->middleware("auth");
Route::resource("/dashboard/komens", KomenController::class)->middleware("auth");

Route::get("/struktur", function(){
    return view("struktur", [
        "title" => "struktur",
        "strukturs" => Struktur::all()
    ]);
});
Route::resource("/dashboard/strukturs", DashboardStrukturController::class)->middleware("auth");
