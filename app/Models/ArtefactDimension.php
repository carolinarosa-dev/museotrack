<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtefactDimension extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'artefact_id',
        'height',
        'width',
        'length',
        'depth',
        'thickness',
        'diameter',
        'weight',
        'capacity',
        'other_data',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // RELATIONSHIP
    public function artefact()
    {
        return $this->belongsTo(Artefact::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
