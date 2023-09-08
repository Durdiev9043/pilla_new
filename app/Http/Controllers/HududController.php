<?php

namespace App\Http\Controllers;

use App\Models\Hudud;
use App\Models\Region;
use App\Models\Staff;
use App\Models\Village;
use Illuminate\Http\Request;

class HududController extends Controller
{
    public function index()
    {
        $villages=Hudud::all();
        $staffes=Staff::all();
        return view('admin.hudud.index',['villages'=>$villages,'staffes'=>$staffes]);
    }

    public function create()
    {
        $regions=Region::all();
        return view('admin.hudud.create',['regions'=>$regions]);
    }

    public function store(Request $request)
    {
        Hudud::create($request->all());
        return redirect()->route('admin.region.show',$request->region_id);
    }

    public function show($id)
    {
        $staffes=Staff::all()->where('hudud_id','=',$id);
//        $staffes=Staff::all();
        return view('admin.staff.index',['staffes'=>$staffes,'id'=>$id]);
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
