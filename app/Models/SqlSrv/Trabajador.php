<?php

namespace App\Models\SqlSrv;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Trabajador extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'dbo.Trabajador';

    public $incrementing = false;

    public static function getInfoCuenta($rut)
    {
        return DB::connection('sqlsrv')
            ->table('dbo.Trabajador as t')
            ->select(
                't.RutTrabajador as rut',
                't.NumeroCuentaBancaria as numero_cuenta',
                'b.Nombre as banco'
            )
            ->join('dbo.Banco as b', [
                'b.IdEmpresa' => 't.IdEmpresa',
                'b.IdBanco' => 't.IdBanco'
            ])
            ->where('t.RutTrabajador', $rut)
            ->first();
    }

    public static function getObtenerTrabajador($rut, $empresaId)
    {
        $t = DB::connection('sqlsrv')
            ->table('dbo.Trabajador as t')
            ->join('dbo.Contratos as c', [
                'c.IdEmpresa' => 't.IdEmpresa',
                'c.IdTrabajador' => 't.IdTrabajador'
            ])
            ->where('t.RutTrabajador', $rut)
            //->where('c.IndicadorVigencia', true)
            ->whereIn('t.IdEmpresa', [$empresaId])
            ->orderBy('c.IdContrato', 'DESC')
            ->first();

        if (!$t) {
            return [
                'error' => 'Trabajador no encontrado'
            ];
        }

        if (!$t->IndicadorVigencia) {
            return [
                'error' => 'Trabajador cesado. FECHA TERMINO: ' . Carbon::parse($t->FechaTermino)->format('d/m/Y'),
            ];
        }

        if ($t->Jornal) {
            $ultimaDiaLaborado = DB::connection('sqlsrv')
                ->table('ActividadTrabajador as a')
                ->where('a.RutTrabajador', $rut)
                ->orderBy('a.FechaActividad', 'DESC')
                ->first();

            if (Carbon::parse($ultimaDiaLaborado->FechaActividad)->diffInDays(Carbon::now()) <= 2) {
                $t->IdZonaLabores = $ultimaDiaLaborado->IdZona;
            }
        }

        return [
            'message' => 'Trabajador obtenido. ' . ($t->Jornal ? 'CON': 'SIN') . ' DIGITACIÓN.' . ($t->Jornal ? ' Último día laborado: ' . Carbon::parse($ultimaDiaLaborado->FechaActividad)->format('d/m/Y') : ''),
            'trabajador' => [
                'rut' => $rut,
                'code' => $t->IdTrabajador,
                'nombre' => $t->Nombre,
                'apellido_paterno' => $t->ApellidoPaterno,
                'apellido_materno' => $t->ApellidoMaterno,
                'fecha_nacimiento' => Carbon::parse($t->FechaNacimiento)->format('Y-m-d'),
                'sexo' => $t->Sexo,
                'email' => $t->Mail,
                'tipo_zona_id' => $t->IdTipoZona,
                'nombre_zona' => $t->NombreZona,
                'tipo_via_id' => $t->IdTipoVia,
                'nombre_via' => $t->NombreVia,
                'direccion' => $t->Direccion,
                'distrito_id' => $t->COD_COM,
                'estado_civil_id' => $t->EstadoCivil,
                'nacionalidad_id' => $t->IdNacionalidad,
                'empresa_id' => $empresaId,
                'numero_cuenta' => $t->NumeroCuentaBancaria,
                'zona_labor_id' => $t->IdZonaLabores
            ]
        ];
    }

    public static function getTrabajadorParaFiniquito($rut, $fechaFiniquito, $masivo=false)
    {
        $fechaFiniquito = Carbon::parse($fechaFiniquito);

        try {
            $trabajador = DB::connection('sqlsrv')
                ->table('Contratos as c')
                ->select(
                    't.RutTrabajador as persona_id',
                    't.Nombre as nombre',
                    't.ApellidoPaterno as apellido_paterno',
                    't.ApellidoMaterno as apellido_materno',
                    DB::raw('CAST(t.FechaNacimiento as date) fecha_nacimiento'),
                    't.Direccion as direccion',
                    't.Sexo as sexo',
                    DB::raw('CAST(c.FechaInicioPeriodo as date) fecha_inicio_periodo'),
                    DB::raw('CAST(c.FechaTerminoC as date) fecha_termino_contrato'),
                    DB::raw('CAST(c.IdRegimen as int) regimen_id'),
                    DB::raw('CAST(c.IdEmpresa as int) empresa_id'),
                    'o.IdOficio as oficio_id',
                    'o.Descripcion as oficio_name',
                    'z.IdZona as zona_labor_id',
                    'z.Nombre as zona_name',
                    'c.Jornal as jornal',
                    'c.IdEmpresa as empresa_id'
                )
                ->join('Trabajador as t', [
                    't.IdEmpresa' => 'c.IdEmpresa',
                    't.IdTrabajador' => 'c.IdTrabajador'
                ])
                ->join('Oficio as o', [
                    'o.IdEmpresa' => 'c.IdEmpresa',
                    'o.IdOficio' => 'c.IdOficio'
                ])
                ->join('Zona as z', [
                    'z.IdEmpresa' => 't.IdEmpresa',
                    'z.IdZona' => 't.IdZonaLabores'
                ])
                ->where('c.IndicadorVigencia', 1)
                ->whereNull('c.FechaTermino')
                ->where('t.RutTrabajador', $rut)
                ->whereIn('t.idEmpresa', [9, 14])
                ->first();

            if (!$trabajador) {
                return [
                    'message' => 'RUT no encontrado',
                    'data'  => [
                        'rut' => $rut,
                    ],
                    'error' => true,
                ];
            }

            $trabajador->persona = [
                'id' => $trabajador->persona_id,
                'nombre' => $trabajador->nombre,
                'apellido_paterno' => $trabajador->apellido_paterno,
                'apellido_materno' => $trabajador->apellido_materno,
                'direccion' => $trabajador->direccion,
                'fecha_nacimiento' => $trabajador->fecha_nacimiento,
                'sexo' => $trabajador->sexo
            ];

            $trabajador->oficio = [
                'id' => $trabajador->oficio_id,
                'name' => $trabajador->oficio_name
            ];
            $trabajador->tiempo_servicio = $fechaFiniquito->diffInMonths($trabajador->fecha_inicio_periodo);

            $trabajador->tipo_cese_id = $trabajador->tiempo_servicio < 3 ? 1 : (
                $fechaFiniquito->toDateString() === $trabajador->fecha_termino_contrato ? 3 : 2
            );

            if ($trabajador->jornal) {
                $ultimaActividad = DB::connection('sqlsrv')
                    ->table('ActividadTrabajador as a')
                    ->select(
                        'a.IdActividadTrabajador as id',
                        DB::raw('cast(a.FechaActividad as date) as fecha_actividad'),
                        'a.IdZona as zona_id',
                        'z.Nombre as zona_name'
                    )
                    ->join('Zona as z', [
                        'a.IdEmpresa' => 'z.IdEmpresa',
                        'a.IdZona' => 'z.IdZona'
                    ])
                    ->where('a.RutTrabajador', $trabajador->persona_id)
                    ->orderBy('a.FechaActividad', 'DESC')
                    ->first();

                if (Carbon::parse($ultimaActividad->fecha_actividad)->greaterThan($fechaFiniquito)) {
                    return [
                        'message' => 'Este trabajador tiene ASISTENCIA el dia ' . $fechaFiniquito->toDateString() . ', no se puede registrar el finiquito',
                        'data'  => [
                            'rut' => $rut,
                        ],
                        'error' => true,
                    ];
                }

                $trabajador->zona_labor = $ultimaActividad->zona_name;
                $trabajador->ultimo_dia_laborado = $ultimaActividad->fecha_actividad;
            } else {
                $trabajador->zona_labor = $trabajador->zona_name;
            }

            $estaDeVacaciones = DB::connection('sqlsrv')
                ->table('Vacaciones as v')
                ->where(function ($query) use ($fechaFiniquito, $rut, $trabajador) {
                    $query->where('v.RutTrabajador', $rut);
                    $query->where('v.IdEmpresa', $trabajador->empresa_id);
                    $query->whereDate('v.FechaInicio', '<=', $fechaFiniquito);
                    $query->whereDate('v.FechaFinal', '>=', $fechaFiniquito);
                })
                ->orWhere(function ($query) use ($fechaFiniquito, $rut, $trabajador) {
                    $query->where('v.RutTrabajador', $rut);
                    $query->where('v.IdEmpresa', $trabajador->empresa_id);
                    $query->whereDate('v.FechaInicio', '<=', $fechaFiniquito);
                    $query->whereDate('v.FechaFinal', '>=', $fechaFiniquito);
                })
                ->orderBy('v.FechaInicio', 'DESC')
                ->first();

            //dd($estaDeVacaciones);

            if ($estaDeVacaciones) {
                return [
                    'message' => 'El trabajador esta de VACACIONES en desde el ' . Carbon::parse($estaDeVacaciones->FechaInicio)->format('d/m/Y') . ' hasta el ' . Carbon::parse($estaDeVacaciones->FechaFinal)->format('d/m/Y'),
                    'data'  => [
                        'rut' => $rut,
                    ],
                    'error' => true
                ];
            }

            $permisosInasistencias = DB::connection('sqlsrv')
                ->table('dbo.PermisosInasistencias as p')
                ->where([
                    'p.RutTrabajador' => $rut
                ])
                ->whereDate('p.FechaInicio', $fechaFiniquito)
                ->whereNotIn('MotivoAusencia', ['PERMISO', 'FALTA'])
                ->first();

            if ($permisosInasistencias) {
                return [
                    'message' => 'El trabajador tiene ' . $permisosInasistencias->MotivoAusencia . ' el dia ' . Carbon::parse($permisosInasistencias->FechaInicio)->format('d/m/Y'),
                    'data'  => [
                        'rut' => $rut,
                    ],
                    'error' => true
                ];
            }

            /* if ($masivo) {
                if (Carbon::parse($trabajador->fecha_inicio_periodo)->diffInYears($fechaFiniquito) >= 5) {
                    return [
                        'message' => 'Este trabajador tiene 5 años de tiempo de servicio. No se puede finiquitar por este medio',
                        'data'  => [
                            'rut' => $rut,
                        ],
                        'error' => true,
                    ];
                }
            } */

            if (Carbon::parse($trabajador->fecha_inicio_periodo)->diffInYears($fechaFiniquito) >= 5) {
                return [
                    'message' => 'Este trabajador tiene 5 años de tiempo de servicio. No se puede finiquitar por este medio',
                    'data'  => [
                        'rut' => $rut,
                    ],
                    'error' => true,
                ];
            }

            if ($trabajador->regimen_id == 2 || $trabajador->regimen_id == 4) {
                return [
                    'message' => 'No se puede finiquitar a un TRABAJADOR RESTRINGIDO por este medio',
                    'data'  => [
                        'rut' => $rut,
                    ],
                    'error' => true,
                ];
            } else if ($trabajador->regimen_id == 1) {
                return [
                    'message' => 'Trabajador Obtenido. EMPLEADO AGRARIO',
                    'data' => $trabajador,
                ];
            }

            return [
                'message' => 'Trabajador Obtenido',
                'data' => $trabajador
            ];
        } catch (\Exception $e) {
            return [
                'message' => $e->getMessage(),
                'error' => true,
                'data' => [
                    'rut' => $rut,
                    'error' => $e->getMessage()
                ]
            ];
        }
    }
}
