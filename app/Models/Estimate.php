<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Estimate extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['name', 'user_id', 'hourly_rate'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sections()
    {
        return $this->hasMany(EstimateSection::class, 'estimate_id')->orderBy('position');
    }
}
