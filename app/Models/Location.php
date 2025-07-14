<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'artefact_id',
        'location',
        'specifications',
        'date',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $dates = ['date', 'created_at', 'updated_at', 'deleted_at'];

    // RELATIONSHIPS
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

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($location) {
            $location->deleted_by = auth()->id();
            $location->saveQuietly();
        });
    }

}
