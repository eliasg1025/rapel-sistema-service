<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DocumentoTuRecibo extends Model
{
    protected $table = 'documentos_turecibo';

    public static function _getByTrabajador($rut)
    {
        return DB::table('documentos_turecibo as dt')
            ->select(
                'dt.id as key',
                'dt.id',
                'dt.mes',
                'dt.ano',
                'dt.estado',
                'dt.fecha_carga',
                'dt.fecha_firma',
                'e.shortname as empresa',
                're.name as regimen',
                'td.name as tipo_documento'
            )
            ->join('empresas as e', 'e.id', '=', 'dt.empresa_id')
            ->join('regimenes as re', 're.id', '=', 'dt.regimen_id')
            ->join('tipo_documentos_turecibo as td', 'td.id', '=', 'dt.tipo_documento_turecibo_id')
            ->where('dt.rut', $rut)
            ->get();
    }

    public static function _get($tipo_documento_turecibo_id, $estado, $empresa_id, $regimen_id, $zona_labor_id)
    {
        $zona_labor = ZonaLabor::where([
            'code' => $zona_labor_id,
            'empresa_id' => $empresa_id
        ])->first();

        $result = DB::table('documentos_turecibo as dt')
            ->select(
                'dt.id as key',
                'dt.id',
                'e.shortname as empresa',
                DB::raw('CONCAT(dt.mes, "-", dt.ano) as periodo'),
                DB::raw('CONCAT(dt.apellido_paterno, " ", dt.apellido_materno, " ", dt.nombre) as nombre_completo'),
                're.name as regimen',
                'dt.estado',
                'z.name as zona_labor'
            )
            ->join('empresas as e', 'e.id', '=', 'dt.empresa_id')
            ->join('regimenes as re', 're.id', '=', 'dt.regimen_id')
            ->leftJoin('zona_labores as z', 'z.id', '=', 'dt.zona_labor_id')
            ->where('dt.estado', $estado)
            ->where('dt.tipo_documento_turecibo_id', $tipo_documento_turecibo_id)
            ->where('dt.empresa_id', $empresa_id)
            ->where('dt.regimen_id', $regimen_id)
            ->when($zona_labor !== null, function($query) use ($zona_labor) {
                $query->where('dt.zona_labor_id', $zona_labor->id);
            })
            ->get();

        return $result;
    }

    public static function massiveCreate($empresa_id, $tipo_documento_turecibo_id, array $documentos)
    {
        $count = 0;
        $total = sizeof($documentos);
        $errors = [];

        foreach ($documentos as $documento)
        {
            try {
                DB::table('documentos_turecibo')->updateOrInsert(
                    [
                        'rut' => $documento['rut'],
                        'ano' => $documento['ano'],
                        'mes' => $documento['mes'],
                        'empresa_id' => $empresa_id,
                        'tipo_documento_turecibo_id' => $tipo_documento_turecibo_id
                    ],
                    [
                        'nombre' => $documento['nombre'],
                        'apellido_paterno' => $documento['apellido_paterno'],
                        'apellido_materno' => $documento['apellido_materno'],
                        'estado' => $documento['estado'],
                        'fecha_carga' => DateTime::createFromFormat('d/m/Y H:i', $documento['fecha_carga']),
                        'fecha_firma' => isset($documento['fecha_firma']) ? DateTime::createFromFormat('d/m/Y H:i', $documento['fecha_firma']) : null,
                        'regimen_id' => $documento['regimen_id'],
                        'zona_labor_id' => isset($documento['zona_labor_id']) ? $documento['zona_labor_id'] : null,
                    ]
                );

                $count++;
            } catch (\Exception $e) {
                array_push($errors, [
                    'id' => $documento['rut'],
                    'error' => $e->getMessage()
                ]);
            }
        }

        return [
            'total' => $total,
            'completados' => $count,
            'errores' => $errors,
        ];
    }

    public static function getCantidadFirmadosPorDia($tipo_documento_turecibo_id, $desde, $hasta)
    {
        $result = DB::select('CALL obtener_cantidad_firmados_por_dia(?, ?, ?)', [
            $tipo_documento_turecibo_id,
            $desde,
            $hasta
        ]);

        $dias = array_column($result, 'dia');
        $cantidades = array_column($result, 'cantidad');

        return [
            'dias' => $dias,
            'cantidades' => $cantidades
        ];
    }
}
