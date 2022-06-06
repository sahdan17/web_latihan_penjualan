<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        $kategori = DB::table('kategoris')->get();
        $data = [];
        $label = [];
        foreach ($kategori as $i => $v) {
            $value[$i] = DB::table('produks')->where('id_kategori',$v->id)->count();
            $label[$i] = $v->nama;
        }
        return view('home')
        ->with('value',json_encode($value))
        ->with('label',json_encode($label));
    }
}
