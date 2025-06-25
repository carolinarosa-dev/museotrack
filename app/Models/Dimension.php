<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dimension extends Model
{
    use HasFactory;

    protected $table = 'dimensions';
    protected $fillable = ['artifact_id', 'length', 'width', 'height', 'depth', 'capacity', 'diameter', 'thickness', 'other_relevant_data','ative'];

    public function artifact()
    {
        return $this->belongsTo(Artifact::class);
    }
}
