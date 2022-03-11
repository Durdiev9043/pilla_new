<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Models\Hudud;
use App\Models\Region;
use App\Models\Staff;
use App\Models\Village;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class VillageController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $hududs=Hudud::all();
        $regions=Region::all();
        return view('admin.village.create',['hududs'=>$hududs,'regions'=>$regions]);
    }

    public function store(Request $request)
    {
        $village=new Village();
        $village->create($request->all());

        return redirect()->route('admin.hudud.show',$request->hudud_id);
    }

    public function show($id)
    {

        $staffes=Staff::all()->where('village_id','=',$id);
        return view('admin.staff.index',['staffes'=>$staffes,'id'=>$id]);
    }

    public function edit(Village $village)
    {
        return view('admin.village.edit',['village'=>$village]);
    }

    public function update(Request $request,Village $village)
    {
        $village->update($request->all());
        return redirect()->route('admin.region.show',$request->region_id);
    }

    public function destroy(Village $village)
    {
        $village->delete();
        return redirect()->back();
    }
}
