<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class EstimateSection extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name', 'description', 'note', 'position', 'estimate_id'];

    public function estimate()
    {
        return $this->belongsTo(Estimate::class, 'estimate_id');
    }

    public function rows()
    {
        return $this->hasMany(EstimateSectionRow::class, 'estimate_section_id')->orderBy('position');
    }
}
