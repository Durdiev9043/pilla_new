<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\FarmStaff;
use App\Models\Region;
use App\Models\Village;
use Illuminate\Http\Request;

class Farm_KasanachiController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $regions=Region::all();
        return view('admin.farm_staff.create',['regions'=>$regions]);
    }

    public function store(Request $request)
    {
        FarmStaff::create($request->all());
        return redirect()->route('admin.farm_s.show',$request->farm_id);
    }

    public function show($id)
    {
        $staffes=FarmStaff::all()->where('farm_id',$id);
        $name=Farm::all()->where('id',$id)->first();
        return view('admin.farm_staff.index',['staffes'=>$staffes,'id'=>$id,'name'=>$name]);
    }

    public function edit( $farmStaff)
    {
        $staff=FarmStaff::all()->where('id',$farmStaff)->first();
        return view('admin.farm_staff.edit',['staff'=>$staff]);
    }

    public function update(Request $request,$farmStaff)
    {
        $farm=FarmStaff::all()->where('id',$farmStaff)->first();
        $farm->update($request->all());
        return redirect()->route('admin.farm_s.show',$farm->farm_id);
    }

    public function destroy($farmStaff)
    {
        FarmStaff::all()->where('id',$farmStaff)->first()->delete();
        return redirect()->back();
    }
}
