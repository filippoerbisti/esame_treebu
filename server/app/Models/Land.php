<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    public function land_type() {
        return $this->belongsTo(LandType::class);
    }

    public function irrigation_type() {
        return $this->belongsTo(IrrigationType::class);
    }

    public function offer_type() {
        return $this->belongsTo(OfferType::class);
    }
}
