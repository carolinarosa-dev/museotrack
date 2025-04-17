<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class SuperCategory extends Model
{
    use HasFactory;

    protected $table = 'supercategories';
    protected $fillable = ['name','description','active'];

    public function artifacts()
    {
        return $this->hasMany(Artifact::class);
    }
}
