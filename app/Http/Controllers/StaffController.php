<?php

namespace App\Http\Controllers;

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
        $villages=Village::all();
        $regions=Region::all();
        return view('admin.staff.create',['villages'=>$villages,'regions'=>$regions]);
    }

    public function store(Request $request)
    {
        Staff::create($request->all());
        return redirect()->route('admin.village.show',$request->village_id);
    }

    public function show($id)
    {
        //
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
