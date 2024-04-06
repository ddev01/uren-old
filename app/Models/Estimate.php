<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Estimate
 *
 * @property string $id
 * @property string $name
 * @property float|null $hourly_rate
 * @property bool $show_notes
 * @property bool $public
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EstimateSectionRow> $sectionRows
 * @property-read int|null $section_rows_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EstimateSection> $sections
 * @property-read int|null $sections_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EstimateShare> $shares
 * @property-read int|null $shares_count
 * @property-read \App\Models\User $user
 *
 * @method static \Database\Factories\EstimateFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereHourlyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate wherePublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereShowNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estimate whereUserId($value)
 *
 * @mixin \Eloquent
 */
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
