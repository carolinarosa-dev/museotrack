<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Incorporation extends Model
{
    use HasFactory;

    protected $table = 'incorporations';
    protected $fillable = ['artifact_id', 'date'];

    public function artifact()
    {
        return $this->belongsTo(Artifact::class);
    }
}
