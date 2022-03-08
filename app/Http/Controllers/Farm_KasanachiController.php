<?php

namespace App\Http\Controllers;

use App\Models\Farm_Staff;
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
        Farm_Staff::create($request->all());
        return route('admin.farm_s.index');
    }

    public function show($id)
    {
        //
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
