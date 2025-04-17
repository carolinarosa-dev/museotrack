<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Author extends Model
{
    use HasFactory;

    protected $table = 'authors'; // Nome correto da tabela

    protected $fillable = ['artifact_id', 'image_id', 'name', 'birth_date', 'birthplace', 'added_at'];

    public function artifact()
    {
        return $this->belongsTo(Artifact::class, 'artifact_id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}

