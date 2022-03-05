<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Region;
use App\Models\Village;
use Illuminate\Http\Request;

class FarmController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $villages=Village::all();
        $regions=Region::all();
        return view('admin.farm.create',['villages'=>$villages,'regions'=>$regions]);
    }

    public function store(Request $request)
    {
        Farm::create($request->all());
        return redirect()->route('admin.farm.show',$request->village_id);
    }

    public function show($id)
    {
        $farmes=Farm::all()->where('village_id',$id);
        return view('admin.farm.index',['farmes'=>$farmes,'id'=>$id]);
    }


    public function edit(Farm $farm)
    {
        return view('admin.farm.edit',['farm'=>$farm]);
    }


    public function update(Request $request, Farm $farm)
    {
        $farm->update($request->all());
        return redirect()->route('admin.farm.show',$request->village_id);
    }

    public function destroy(Farm $farm)
    {
        $farm->delete();
        return redirect()->back();
    }
}
