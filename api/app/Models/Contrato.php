<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ContratistaContrato;

class Contrato extends Model
{
    use HasFactory;

    //1 Contrato tiene una Fuente, una Fuente tiene muchos Contratos
    public function fuente(){
        return $this->belongsTo('App\Models\Fuente', 'id_fuente_contract', 'id');
    }

    //1 Contrato tiene muchos Contratistas, un Contratista tiene un Contrato
    public function contratistas(){
        return $this->hasMany('App\models\ContratistaContrato', 'id_contrato', 'id');
    }

    //1 Contrato tiene muchas clasificaciones, una ClasificacionContrato tiene un Contrato
    public function clasificaciones(){
        return $this->hasMany('App\models\ClasificacionContrato', 'id_contrato', 'id');
    }
}
