<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasUuids;

    protected $fillable = ['name', 'user_id', 'hourly_rate'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sections()
    {
        return $this->hasMany(EstimateSection::class, 'estimate_id')->orderBy('position');
    }

    public function sectionRows()
    {
        return $this->hasManyThrough(EstimateSectionRow::class, EstimateSection::class);
    }

    public function shares()
    {
        return $this->hasMany(EstimateShare::class, 'estimate_id');
    }
}
