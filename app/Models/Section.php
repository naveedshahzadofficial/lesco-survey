<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['section_e', 'section_u', 'section_desc_e', 'section_desc_u'];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
