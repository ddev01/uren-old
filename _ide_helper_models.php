<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace App\Models{
    /**
     * App\Models\Estimate
     *
     * @property string $id
     * @property string $name
     * @property int|null $hourly_rate
     * @property int $show_notes
     * @property int $public
     * @property string $user_id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EstimateSection> $sections
     * @property-read int|null $sections_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EstimateShare> $shares
     * @property-read int|null $shares_count
     * @property-read \App\Models\User $user
     *
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
     */
    class Estimate extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\EstimateSection
     *
     * @property string $id
     * @property string|null $name
     * @property string|null $description
     * @property string|null $note
     * @property int $position
     * @property string $estimate_id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Estimate $estimate
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EstimateSectionRow> $rows
     * @property-read int|null $rows_count
     *
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
     */
    class EstimateSection extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\EstimateSectionRow
     *
     * @property string $id
     * @property string $type
     * @property int|null $hours
     * @property string|null $name
     * @property string|null $description
     * @property string|null $note
     * @property int $position
     * @property string $estimate_section_id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\EstimateSection $section
     *
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
     */
    class EstimateSectionRow extends \Eloquent
    {
    }
}

namespace App\Models{
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
     */
    class EstimateShare extends \Eloquent
    {
    }
}

namespace App\Models{
    /**
     * App\Models\User
     *
     * @property string $id
     * @property string $name
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property mixed $password
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
     * @property-read int|null $tokens_count
     *
     * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     */
    class User extends \Eloquent
    {
    }
}
