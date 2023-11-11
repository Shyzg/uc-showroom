<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model {
    use HasFactory;

    protected $guarded = ['id'];

    public function vehicle() {
        return $this->morphOne(Vehicle::class, 'type');
    }
}
