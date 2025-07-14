<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'artefact_id',
        'type_id',
        'date',
        'location',
        'author_id',
        'photos',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'photos' => 'array',
        'date' => 'date',
    ];

    public function artefact()
    {
        return $this->belongsTo(Artefact::class);
    }

    public function type()
    {
        return $this->belongsTo(ImageType::class, 'type_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }


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
}
