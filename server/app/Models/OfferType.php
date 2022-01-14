<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferType extends Model
{
    use HasFactory;

    public $with = [
        'lands',
    ];

    public function lands() {
        return $this->hasMany(Land::class);
    }
}