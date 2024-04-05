<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name', 'user_id', 'hourly_rate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Estimate>
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<EstimateSection>
     */
    public function sections()
    {
        return $this->hasMany(EstimateSection::class, 'estimate_id')->orderBy('position');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough<EstimateSectionRow>
     */
    public function sectionRows()
    {
        return $this->hasManyThrough(EstimateSectionRow::class, EstimateSection::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<EstimateShare>
     */
    public function shares()
    {
        return $this->hasMany(EstimateShare::class, 'estimate_id');
    }
}
