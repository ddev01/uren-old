<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateShare extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['user_email', 'estimate_id'];
}
