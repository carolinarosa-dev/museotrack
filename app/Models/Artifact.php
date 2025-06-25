<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Artifact extends Model
{
    use HasFactory;

    protected $table = 'artifacts'; // Nome correto da tabela
    protected $fillable = ['super_category_id', 'author_id', 'category', 'name', 'technique', 'workshop', 'material', 'dating', 'added_at','ative','history'];

    public function supercategory()
    {
        return $this->belongsTo(SuperCategory::class, 'super_category_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function dimensions()
    {
        return $this->hasOne(Dimension::class);
    }

    public function imagerecord()
    {
        return $this->hasMany(imageRecord::class);
    }

    public function incorporation()
    {
        return $this->hasMany(Incorporation::class);
    }

    public function information()
    {
        return $this->hasOne(Information::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function room()
    {
        return $this->hasOne(Room::class);
    }
}

