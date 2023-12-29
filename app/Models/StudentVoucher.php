<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StudentVoucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'status'
    ];

    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }
}
