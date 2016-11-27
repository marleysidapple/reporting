<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';

    protected $fillable = array('patient_id', 'mrn', 'clinical_history', 'specimen', 'diagnosis', 'gross_description');

    public function patient()
    {
        return $this->belongsTo('App\User');
    }
}
