<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technique extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Relations to users
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


    // Auto set created_by and updated_by
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (auth()->check()) {
                $model->created_by = auth()->id();
                $model->updated_by = auth()->id();
            }
        });

        static::updating(function ($model) {
            if (auth()->check()) {
                $model->updated_by = auth()->id();
            }
        });

        static::deleting(function ($model) {
            if (auth()->check()) {
                $model->deleted_by = auth()->id();
                $model->save();
            }
        });
    }

    public function artefacts()
    {
        return $this->belongsToMany(Artefact::class, 'artefact_techniques')
            ->withPivot(['created_by', 'updated_by', 'deleted_by'])
            ->withTimestamps();
    }
}
