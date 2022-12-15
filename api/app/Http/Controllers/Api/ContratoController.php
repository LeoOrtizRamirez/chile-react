<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\ClasificacionContrato;
use App\Models\Contrato;
use App\Models\ContratistaContrato;
use App\Models\SubCategoria;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function index()
    {
        $contratos = Contrato::with('fuente', 'clasificaciones', 'contratistas')->get();
        foreach ($contratos as $key => $value) {
            $contratista = ContratistaContrato::where('id_contrato', $value->id)->first();
            if($contratista){
                $value->contratista =  $contratista->nombre;
            }

            $actividad_economica = ClasificacionContrato::where('id_contrato', $value->id)->first();
            if($actividad_economica){
                $sub_categoria = SubCategoria::find($actividad_economica->id_sub_categoria); 
                $value->actividad_economica =  $sub_categoria->nombre;
            }
        }
        return $contratos;
    }

    public function store(Request $request)
    {
       $contrato = new Contrato();
       $contrato->save();
    }

    public function show($id)
    {
        $contrato = Contrato::find($id);
        return $contrato;
    }

    public function update(Request $request, $id)
    {
        $contrato = Contrato::findOrFail($request->id);
        $contrato->entidad_contratante = $request->entidad_contratante;
        $contrato->save();
        return $contrato;
    }
    
    public function destroy($id)
    {
       $contrato = Contrato::destroy($id);
       return $contrato;
    }
}
