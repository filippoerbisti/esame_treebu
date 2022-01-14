<?php

namespace App\Http\Controllers;

use App\Models\LandType;
use Illuminate\Http\Request;

class LandTypeController extends Controller
{
    public function list() {
        return LandType::all();
    }
}
