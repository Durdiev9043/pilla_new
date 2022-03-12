<?php

namespace App\Http\Controllers;

use App\Models\FarmStaff;
use Illuminate\Http\Request;

class Farm_KasanachiController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('admin.farm_staff.create');
    }

    public function store(Request $request)
    {
        FarmStaff::create($request->all());
        return route('admin.farm_s.index');
    }

    public function show($id)
    {
        $staffes=FarmStaff::all()->where('farm_id',$id);
        return view('admin.farm_staff.index',['staffes'=>$staffes]);
    }

    public function edit($id)
    {
        return view('admin.farm_staff.edit');
    }

    public function update(Request $request, Farm_Staff $farm_staff)
    {
        //
    }

    public function destroy(Farm_Staff $farm_staff)
    {
        $farm_staff->delete();
        return redirect()->back();
    }
}
