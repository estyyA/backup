<?php

namespace App\Http\Controllers;
use App\Movies;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;


class PageController extends Controller
{
    public function home()
    {
        return view("home", ["key" => "home"]);
    }
    public function movies()
    {
        $movies = Movies:: orderBy('id', 'desc')->get();

        return view("movies", ["key" => "movies", "mv" => $movies]);
    }
    public function addmovies() 
    {
        return view("formadd", ["key" => "movies"]);
    }
    public function savemovies(Request $request) 
    {
        $file_name =time().'-'.$request->file('poster')->getClientOriginalName();
        $path = $request->file('poster')->storeAs('poster', $file_name, 'public');

        Movies::create([
            'title'=>  $request->title,
            'genre' =>  $request->genre,
            'year'  =>  $request->year,
            'poster'=>  $path
        ]);

        return redirect("movies")->with('alert', 'Data Berhasil di Simpan');
    }
    public function editmovies($id)
    {
        $movies = Movies::find($id);
        return view("formedit", ["key" => "movies", "mv" => $movies]);
    }
    public function updatemovies($id, Request $request)
    {
        $movies = Movies::find($id);

        $movies->title = $request->title;
        $movies->genre = $request->genre;
        $movies->year = $request->year;

        if ($request->poster)
        {
            if($movies->poster)
            {
                Storage::disk('public')->delete($movies->poster);
            }

        $file_name =time().'-'.$request->file('poster')->getClientOriginalName();
        $path = $request->file('poster')->storeAs('poster', $file_name, 'public');
        $movies->poster = $path;

        }

        $movies->save();
        return redirect("/movies")->with('alert', 'Data berhasil di ubah');
    }
    public function deletemovies($id)
    {
        $movies = Movies::find($id);

        if($movies->poster)
            {
                Storage::disk('public')->delete($movies->poster);
            }
            $movies->delete();

            return redirect("/movies")->with('alert', 'Data Berhasil di Hapus');
    }
    public function login()
    {
        return view("login");
    }
    public function edituser()
    {
        return view("edituser", ["key"=>""]);
    }

    public function updateuser(Request $request)
    {
        if ($request->password_baru == $request->konfirmasi_password)
        {
            $user = Auth::user();
            
            $user->password = bcrypt($request->password_baru);

            $user->save();

            return redirect("/user")->with("info", "Password Berhasil di Ubah");//haipanda
        }
        else
        {
            return redirect("/user")->with("info", "Password gagal di Ubah");
        }
    }

}
