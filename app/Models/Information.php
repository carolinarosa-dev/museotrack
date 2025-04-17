<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Information extends Model
{
    use HasFactory;

    protected $table = 'information';
    protected $fillable = ['artifact_id', 'description', 'origin', 'observations', 'history', 'bibliography', 'added_at'];

    public function artifact()
    {
        return $this->belongsTo(Artifact::class);
    }
}
