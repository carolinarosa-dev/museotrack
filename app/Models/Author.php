<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'photo',
        'birth_date',
        'death_date',
        'bibliography',
        'address',
        'contacts',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'contacts' => 'array',
        'birth_date' => 'date',
        'death_date' => 'date',
    ];



   /* public function artefacts()
    {
        return $this->belongsToMany(Artefact::class)
            ->withTimestamps()
            ->withPivot(['created_by', 'updated_by', 'deleted_by'])
            ->using(\Illuminate\Database\Eloquent\Relations\Pivot::class);
    }*/

  public function artefacts()
    {
        return $this->belongsToMany(Artefact::class,'artefact_authors')
            ->withTimestamps()
            ->withPivot(['created_by', 'updated_by', 'deleted_by']);
    }


}
