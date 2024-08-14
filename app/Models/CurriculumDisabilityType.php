<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CurriculumDisabilityType extends Model
{
    use HasFactory;
    protected $table = "curriculum_disability_types";

    protected $fillable = [
        'disability_type_id',
        'curriculum_id'
    ];

    public function curriculum() : BelongsTo
    {
        return $this->belongsTo(Curriculum::class, 'curriculum_id');
    }
    public function disability_Type() : BelongsTo
    {
        return $this->belongsTo(DisabilityType::class, 'disability_type_id');
    }


}

