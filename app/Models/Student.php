<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'cpf',
        'birth_date',
        'enrollment'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function studentVoucher(): HasOne
    {
        return $this->hasOne(StudentVoucher::class);
    }
}
