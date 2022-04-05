<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Hudud;
use App\Models\Village;
use Illuminate\Http\Request;

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


    public function index()
    {
        return redirect()->route('admin.region.index'); //view('admin.master');
    }


    public function village(Request $request){
        $villages=Village::all()->where('hudud_id',$request->hudud_id);
        return $villages;
    }
    public function hudud(Request $request){
        $hududs=Hudud::all()->where('region_id',$request->region_id);
        return $hududs;
    }
    public function farm(Request $request){
        $farms=Farm::all()->where('village_id','=',$request->village_id);
        return $farms;
    }
}
