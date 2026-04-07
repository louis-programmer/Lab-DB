<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientSearchIndex extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'search_text',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}