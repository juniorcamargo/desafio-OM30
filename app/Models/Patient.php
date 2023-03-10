<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'mothers_name',
        'birth_date',
        'CPF',
        'CNS',
        'photo',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }
}
