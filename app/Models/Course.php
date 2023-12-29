<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'name',
            'acronym',
            'type',
            'institution_id'
        ];

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
