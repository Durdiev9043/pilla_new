<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Region;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
       $staffes=DB::table('farm_staff')->select('farm_staff.yakka_tut','farm_staff.algan_qutisi','farm_staff.olgan_gr','farm_staff.topshirish_rejasi','farm_staff.topshirgani','farm_staff.farm_id','farm_staff.toladi')
           ->join('farms','farms.id','farm_staff.farm_id')
           ->where('farm_staff.village_id', $id)->get();
        return view('admin.farm.index',['farmes'=>$farmes,'staffes'=>$staffes,'id'=>$id]);
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
