<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';
    protected $fillable = ['artifact_id', 'postal_code', 'street', 'number', 'city', 'added_at','ative'];

    public function artifact()
    {
        return $this->belongsTo(Artifact::class);
    }
}
