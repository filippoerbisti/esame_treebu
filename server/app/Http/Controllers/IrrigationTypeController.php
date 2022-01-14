<?php

namespace App\Http\Controllers;

use App\Models\IrrigationType;
use Illuminate\Http\Request;

class IrrigationTypeController extends Controller
{
    public function list() {
        return IrrigationType::all();
    }
}
