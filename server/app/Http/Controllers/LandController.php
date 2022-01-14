<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function list(Request $req) {
        $sortMethod = "asc";

        if ($req->query("sort") != null) {
            $sortMethod = $req->query("sort");
        }

        return Land::orderBy("dimension", $sortMethod)->get();
    }

    public function view($id) {
        return Land::where("id", $id)->first();
    }

    public function create(Request $req) {
        $landData = json_decode($req->getContent());

        $land = new Land();

        $land->municipality = $landData->municipality;
        $land->img = $landData->img;
        $land->dimension = $landData->dimension;
        $land->cadastral_sheet = $landData->cadastral_sheet;
        $land->cadastral_map = $landData->cadastral_map;
        $land->cadastral_parcel = $landData->cadastral_parcel;
        $land->land_type = $landData->land_type;
        $land->irrigation_type = $landData->irrigation_type;
        $land->offer_type = $landData->offer_type;
        $land->offer_fee = $landData->offer_fee;
        $land->availability = $landData->availability;

        $land->save();

        return response()->json($land, 201);
    }

    public function edit(Request $req, $id) {
        $land = Land::where("id", $id)->first();

        // Get data from request
        $landData = json_decode($req->getContent());

        $land->municipality = $landData->municipality;
        $land->img = $landData->img;
        $land->dimension = $landData->dimension;
        $land->cadastral_sheet = $landData->cadastral_sheet;
        $land->cadastral_map = $landData->cadastral_map;
        $land->cadastral_parcel = $landData->cadastral_parcel;
        $land->land_type = $landData->land_type;
        $land->irrigation_type = $landData->irrigation_type;
        $land->offer_type = $landData->offer_type;
        $land->offer_fee = $landData->offer_fee;
        $land->availability = $landData->availability;

        $land->save();

        return response()->json($land, 200);
    }

    public function destroy($id) {
        return Land::destroy($id);
    }
}
