<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConservationStatus extends Model
{
    use HasFactory;

    protected $table = 'conservation_status'; // Define o nome da tabela manualmente

    protected $fillable = ['artifact_id', 'status', 'specifications', 'date', 'added_at'];

    public function artifact()
    {
        return $this->belongsTo(Artifact::class, 'artifact_id');
    }
    //
}
