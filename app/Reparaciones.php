<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
class Reparaciones extends Model
{

	protected $table = 'reparaciones';

    
    protected $casts = [
        'fecha_entrada' => 'date:d-m-Y',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'N_reparacion', 'N_Serie', 'Codigo_Cliente','Albaran_Cliente','Marca',
        'Modelo', 'N_RMA', 'Pendiente_Material','Recogido','Fecha_Reparacion','Fecha_Salida','Fecha_Entrada', 'ACABADO', 'Garantia', 'Pte_Presu','Presu_Pte_Acept', 'Estado','PRESUPUESTO', 'ACEPTADO_P', 'NO_ACEPTADO_P', 'PTE_MATERIAL_P', 'ACABADO_P', 'PAGADO'
    ];

}
