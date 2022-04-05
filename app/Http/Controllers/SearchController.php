<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class SearchController extends Controller
{
    public function autocomplete(Request $request){

        $data = Service::select("service_name")->where("service_name","LIKE","%{$request->input('term')}")->pluck('service_name');
        // return response()->json($data);
        return json_encode($data);
    }
}
