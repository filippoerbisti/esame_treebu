<?php

namespace App\Http\Controllers;

use App\Models\OfferType;
use Illuminate\Http\Request;

class OfferTypeController extends Controller
{
    public function list() {
        return OfferType::all();
    }
}
