<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasificacionContrato extends Model
{
    use HasFactory;

    //1 Contrato tiene muchas clasificaciones, una ClasificacionContrato tiene un Contrato
    public function contrato(){
        return $this->belongsTo('App\models\Contrato', 'id_contrato', 'id');
    }

    //1 ClasificacionContrato tiene una SubCategoria, una SubCategoria tiene muchos ClasificacionContrato
    public function subcategoria(){
        return $this->belongsTo('App\Models\SubCategoria', 'id_sub_categoria', 'id');
    }


}
