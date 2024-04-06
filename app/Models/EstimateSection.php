<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EstimateSection
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EstimateSectionRow[] $rows Related EstimateSectionRow models
 * @property string $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $note
 * @property int $position
 * @property string $estimate_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Estimate $estimate
 * @property-read int|null $rows_count
 *
 * @method static \Database\Factories\EstimateSectionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSection whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSection whereEstimateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSection whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSection whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSection wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSection whereUpdatedAt($value)
 *
 * @mixin \Eloquent
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
     */
    public function defaultHours(): float
    {
        // Use the rows() method to get a query builder instance, then apply the where condition
        return $this->rows()
            ->where('type', 'default')
            ->sum('hours');
    }
}
