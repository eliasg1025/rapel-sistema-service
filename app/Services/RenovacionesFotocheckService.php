<?php

namespace App\Services;

use App\Models\RenovacionFotocheck;
use App\Models\Trabajador;
use App\Models\ZonaLabor;

class RenovacionesFotocheckService
{
    public function __construct()
    {
        //
    }

    public function create(
        $trabajador,
        $fechaSolicitud,
        $observacion=null,
        $regimenId,
        $zonaLaborId,
        $empresaId,
        $motivoPeridaFotocheckId,
        $colorFotocheckId,
        $usuarioId
    )
    {
        $trabajadorId = Trabajador::findOrCreate($trabajador);

        $zonaLabor = ZonaLabor::where([
            'code' => $zonaLaborId,
            'empresa_id' => $empresaId
        ])->first();

        $renovacion = new RenovacionFotocheck();
        $renovacion->fecha_solicitud = $fechaSolicitud;
        $renovacion->observacion = $observacion;
        $renovacion->regimen_id = $regimenId;
        $renovacion->zona_labor_id = $zonaLabor->id;
        $renovacion->empresa_id = $empresaId;
        $renovacion->motivo_perdida_fotocheck_id = $motivoPeridaFotocheckId;
        $renovacion->color_fotocheck_id = $colorFotocheckId;
        $renovacion->usuario_id = $usuarioId;
        $renovacion->trabajador_id = $trabajadorId;
        $renovacion->save();

        return $renovacion;
    }
}