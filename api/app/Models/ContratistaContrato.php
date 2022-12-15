<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratistaContrato extends Model
{
    use HasFactory;

    public function contratos(){
        return $this->belongsTo('App\Models\Contrato', 'id_contrato', 'id');
    }
}
