<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateSectionRow extends Model
{
    use HasFactory, HasUuids;

    // protected $touches = ['estimate'];

    protected $fillable = ['name', 'hours', 'description', 'note', 'position', 'estimate_section_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<EstimateSection, EstimateSectionRow>
     */
    public function section()
    {
        return $this->belongsTo(EstimateSection::class, 'estimate_section_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Estimate, EstimateSectionRow>
     */
    public function estimate()
    {
        return $this->belongsTo(Estimate::class, 'estimate_id');
    }
}
