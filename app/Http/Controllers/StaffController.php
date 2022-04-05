<?php

namespace App\Http\Controllers;

use App\Models\Hudud;
use App\Models\Region;
use App\Models\Staff;
use App\Models\Village;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {

        $regions=Region::all();
        $villages=Hudud::all();
        return view('admin.staff.create',['regions'=>$regions,'villages'=>$villages]);
    }

    public function store(Request $request)
    {
        Staff::create($request->all());
        return redirect()->route('admin.village.show',$request->village_id);
    }

    public function show($id)
    {
        $staff=Staff::all()->where('id','=',$id)->first();
        return view('admin.staff.show',['staff'=>$staff]);
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit',['staff'=>$staff]);
    }

    public function update(Request $request,Staff $staff)
    {

        $staff->update($request->all());
        return redirect()->route('admin.village.show',$request->village_id);
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->back();
    }
}
