<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PokemonsController extends Controller
{
    public function index()
    {
        return "Executed successfully";
    }

    public function tampil($order = "")
    {
        if ($order == '1-151') {
            $result = DB::select("SELECT * FROM pokemons ORDER BY id");
        } elseif ($order == '151-1') {
            $result = DB::select("SELECT * FROM pokemons ORDER BY id DESC");
        } elseif ($order == 'a-z') {
            $result = DB::select("SELECT * FROM pokemons ORDER BY name");
        } elseif ($order == 'z-a') {
            $result = DB::select("SELECT * FROM pokemons ORDER BY name DESC");
        } elseif ($order == 'random') {
            $result = DB::select("SELECT * FROM pokemons ORDER BY RAND()");
        } else $result = DB::select("SELECT * FROM pokemons");

        return view('index', ['pokemons' => $result]);
    }

    public function detailp($id = "")
    {
        $result = DB::select("SELECT * FROM pokemons where id=$id");
        $aresult = DB::select("SELECT * FROM pokemons");
        return view('detail')->with('pokemons', $result)
            ->with('allpokemons', $aresult);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $result = DB::select("SELECT * FROM pokemons WHERE name LIKE '%$search%'");
        return view('index', ['pokemons' => $result]);
    }
}
