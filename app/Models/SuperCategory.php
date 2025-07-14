<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuperCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Relação para o utilizador que criou o registo
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relação para o utilizador que atualizou o registo
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // Relação para o utilizador que apagou o registo (soft delete)
    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function artefacts()
    {
        return $this->belongsToMany(Artefact::class, 'artefact_super_categories');
    }
}
