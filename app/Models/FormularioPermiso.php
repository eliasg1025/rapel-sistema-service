<?php

namespace App\Models;

use App\Helpers\DatosHoras;
use Illuminate\Database\Eloquent\Model;

class FormularioPermiso extends Model
{
    protected $table = 'formularios_permisos';

    public static function calcularHoras(DatosHoras $datosHoras)
    {
        if ( !$datosHoras->isValid() ) {
            return [
                'error'   => true,
                'message' => 'La fecha y hora de salida es mayor o igual a la fecha de regreso',
                'horas'   => 0
            ];
        }

        $dias = $datosHoras->getDias();
        $horas = $datosHoras->getHoras();
        $total_horas = $datosHoras->getTotalHoras();

        return [
            'message'     => $total_horas . ' horas de permiso',
            'dias'        => $dias,
            'horas'       => $horas,
            'total_horas' => $total_horas,
        ];
    }
}