<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\FarmStaff;
use App\Models\Hudud;
use App\Models\klaster;
use App\Models\Staff;
use App\Models\Village;
use Illuminate\Http\Request;
use App\Models\Region;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class RegionController extends Controller
{

    public function index()
    {
        $regions=Region::all();
        $staffes = DB::table('staff')
            ->select('*')
            ->join('staff_resurs', 'staff.id', '=', 'staff_resurs.staff_id')
            ->get();
        $farmes=Farm::all();
        return view('admin.region.index',['regions'=>$regions,'farmes'=>$farmes,'staffes'=>$staffes]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id){
//    {$regions=Region::all();
//        $staffes=Staff::all();
//
//        return view('admin.region.index',['regions'=>$regions,'staffes'=>$staffes]);
        $hududs=Hudud::all()->where('region_id','=',$id);
        $staffes = DB::table('staff')
            ->select('*')
            ->join('staff_resurs', 'staff.id', '=', 'staff_resurs.staff_id')
            ->where('region_id',$id)
            ->get();

        $farmes=FarmStaff::all();
        return view('admin.hudud.index',['hududs'=>$hududs,'farmes'=>$farmes,'staffes'=>$staffes]);
    }

    public function edit(Region $region)
    {
        $klasters=klaster::all();
        return view('admin.region.edit',['region'=>$region,'klasters'=>$klasters]);
    }

    public function update(Request $request, Region $region)
    {
        $region->update($request->all());
        return redirect()->route('admin.region.index');
    }

    public function destroy($id)
    {
        //
    }
}
