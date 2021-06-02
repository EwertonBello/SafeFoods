<?php

namespace App\Models;

use App\Scopes\CompanyScope;
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

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accessDeliveries() {
        return $this->hasMany(AccessDelivery::class);
    }

    public function scopeCompanies($query)
    {
        return self::withoutGlobalScope(CompanyScope::class);
    }

    public function scopeCompany($query, $company_id)
    {
        $model = self::withoutGlobalScope(CompanyScope::class);
        return $model->find($company_id);
    }

}
