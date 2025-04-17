<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = ['artifact_id', 'designation', 'added_at'];

    public function artifact()
    {
        return $this->belongsTo(Artifact::class);
    }
}
