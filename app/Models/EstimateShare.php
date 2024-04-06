<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EstimateShare
 *
 * @property string $id
 * @property string $estimate_id
 * @property string $user_email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateShare newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateShare newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateShare query()
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateShare whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateShare whereEstimateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateShare whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateShare whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstimateShare whereUserEmail($value)
 *
 * @mixin \Eloquent
 */
class EstimateShare extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['user_email', 'estimate_id'];
}
