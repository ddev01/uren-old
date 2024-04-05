<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EstimateSectionRow[] $rows Related EstimateSectionRow models
 */
class EstimateSection extends Model
{
    use HasFactory, HasUuids;

    // protected $touches = ['estimate'];

    protected $fillable = ['name', 'description', 'note', 'position', 'estimate_id'];

    /**
     * Get the estimate that owns the section.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Estimate, EstimateSection>
     */
    public function estimate()
    {
        return $this->belongsTo(Estimate::class, 'estimate_id');
    }

    /**
     * Get the rows for the estimate section.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<EstimateSectionRow>
     */
    public function rows()
    {
        return $this->hasMany(EstimateSectionRow::class, 'estimate_section_id')->orderBy('position');
    }

    /**
     * Calculate the default hours from the section rows.
     *
     * @return float
     */
    public function defaultHours()
    {
        return $this->rows->where('type', 'default')->sum('hours');
    }
}
