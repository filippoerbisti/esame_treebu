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

    public function detail($id) {
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
        $land->offer_fee = $landData->offer_fee;
        $land->availability = $landData->availability;
        $land->created_at = $landData->created_at;
        $land->land_types_id = $landData->land_types_id;
        $land->irrigation_types_id = $landData->irrigation_types_id;
        $land->offer_types_id = $landData->offer_types_id;

        $land->save();

        return response()->json($land, 201);
    }

    public function modify(Request $req, $id) {
        $land = Land::where("id", $id)->first();

        // Get data from request
        $landData = json_decode($req->getContent());

        $land->municipality = $landData->municipality;
        $land->img = $landData->img;
        $land->dimension = $landData->dimension;
        $land->cadastral_sheet = $landData->cadastral_sheet;
        $land->cadastral_map = $landData->cadastral_map;
        $land->cadastral_parcel = $landData->cadastral_parcel;
        $land->offer_fee = $landData->offer_fee;
        $land->availability = $landData->availability;
        $land->update_at = $landData->update_at;
        $land->land_types_id = $landData->land_types_id;
        $land->irrigation_types_id = $landData->irrigation_types_id;
        $land->offer_types_id = $landData->offer_types_id;

        $land->save();

        return response()->json($land, 200);
    }

    public function destroy($id) {
        return Land::destroy($id);
    }
}
