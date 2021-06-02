<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessDelivery extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', Carbon::now());
    }
}
