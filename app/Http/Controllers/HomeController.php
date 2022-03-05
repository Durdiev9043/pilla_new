<?php

namespace App\Http\Controllers;

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
        $villages=Village::all()->where('region_id',$request->region_id);
        return $villages;
    }
}
