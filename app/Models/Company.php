<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'image',
        'description',
        'video_presentation',
        'live',
        'delivery',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
