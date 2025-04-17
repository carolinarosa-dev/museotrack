<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageRecord extends Model
{
    use HasFactory;

    protected $table = 'image_records';
    protected $fillable = ['artifact_id', 'location', 'type', 'author', 'dating', 'added_at'];

    public function artifact()
    {
        return $this->belongsTo(Artifact::class);
    }
}
