<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EstimateSectionRow
 *
 * @property string $id
 * @property string $type
 * @property float|null $hours
 * @property string|null $name
 * @property string|null $description
 * @property string|null $note
 * @property int $position
 * @property string $estimate_section_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Estimate|null $estimate
 * @property-read \App\Models\EstimateSection $section
 *
 * @method static \Database\Factories\EstimateSectionRowFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow query()
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow whereEstimateSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow whereHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateSectionRow whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
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
