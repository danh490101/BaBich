<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function getDistrict(Request $request)
    {
        $data['districts'] = District::where("province_id", $request->province_id)->orderBy('name','asc')
            ->get(["name", "id"]);
        return response()->json($data);
    }
    public function getWard(Request $request)
    {
        $data['wards'] = Ward::where("district_id", $request->district_id)->orderBy('name','asc')
            ->get(["name", "id"]);
        return response()->json($data);
    }
}
