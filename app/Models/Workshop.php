<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Workshop extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'photo',
        'address',
        'website',
        'contacts',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'contacts' => 'array', // JSON cast
    ];

    // Relacionamentos para os users que criaram/alteraram/apagaram
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
    public function artefacts()
    {
        return $this->belongsToMany(Artefact::class)
            ->withTimestamps()
            ->withPivot(['created_by', 'updated_by', 'deleted_by'])
            ->withTrashed();
    }




    // Automaticamente preencher os campos de user responsável
    protected static function booted()
    {
        static::creating(function ($workshop) {
            $userId = Auth::id() ?: 1; // fallback para 1 se não houver user autenticado
            $workshop->created_by = $userId;
            $workshop->updated_by = $userId;
        });

        static::updating(function ($workshop) {
            $workshop->updated_by = Auth::id() ?: $workshop->updated_by;
        });

        static::deleting(function ($workshop) {
            $workshop->deleted_by = Auth::id() ?: $workshop->deleted_by;
            $workshop->save();
        });
    }
}
