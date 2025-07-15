<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConservationRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'artefact_id',
        'conservation_state_id',
        'specifications',
        'date',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // RELATIONSHIPS
    public function artefact()
    {
        return $this->belongsTo(Artefact::class);
    }

    public function conservationState()
    {
        return $this->belongsTo(ConservationState::class);
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

