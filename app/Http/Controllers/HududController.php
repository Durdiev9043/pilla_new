<?php

namespace App\Http\Controllers;

use App\Models\Hudud;
use App\Models\Staff;
use App\Models\Village;
use Illuminate\Http\Request;

class HududController extends Controller
{
    public function index()
    {
        $hududs=Hudud::all();
        $staffes=Staff::all();
        return view('admin.hudud.index',['hududs'=>$hududs,'staffes'=>$staffes]);
    }

    public function create()
    {
        return view('admin.hudud.create');
    }

    public function store(Request $request)
    {
        Hudud::create($request->all());
        return redirect()->route('admin.hudud.index');
    }

    public function show($id)
    {
        $villages=Village::all()->where('hudud_id','=',$id);
        $staffes=Staff::all();
        return view('admin.village.index',['villages'=>$villages,'staffes'=>$staffes]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Hudud $hudud)
    {
        $hudud->delete();
        return redirect()->back();
    }
}
