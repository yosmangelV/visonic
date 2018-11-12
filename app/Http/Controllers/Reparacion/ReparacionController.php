<?php

namespace App\Http\Controllers\Reparacion;

use App\Reparaciones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
class ReparacionController extends Controller
{
    

    public function find(Request $request){

    	try {
    		$messages = [
                'numero_serie.required'       => 'Debe ingresar el número de serie para realizar la búsqueda.',
                'numero_serie.min'            => 'El número de serie debe tener al menos 3 carácteres.', 
            ];
            $this->validate($request,[
                'numero_serie'        => 'required|min:3'
                ],$messages);
		
    		$numero_serie=strtoupper($request->numero_serie);
    		$reparacion=Reparaciones::where('N_Serie',$numero_serie)->orderBy('N_reparacion','desc')->first();
    		$status="0";
    		$mensaje="";
    		if(empty($reparacion)){
    			$status="998";
    			$mensaje="";
    		}else{
    			//GARANTIA SI
    			if($reparacion->Garantia=="Si"){
    				//RECIBIDO PENDIENTE REVISION --P201MQLK--
	    			if( 
	    				( empty($reparacion->Pendiente_Material) || 
	    						$reparacion->Pendiente_Material=="No"
	    				) && 
	    				( empty($reparacion->Recogido) || 
	    						$reparacion->Recogido=="No" 
	    				) &&
	    				( empty($reparacion->Fecha_Reparacion)
	    				) &&
	    				( empty($reparacion->Fecha_Salida)
	    				) &&
	    				( empty($reparacion->ACABADO) ||
	    						$reparacion->ACABADO=="No"
	    				) &&
	    				( empty($repacion->Pte_Presu) ||
	    						$reparacion->Pte_Presu=="No"
	    				) &&
	    				( empty($reparacion->Presu_Pte_Acept) ||
	    						$reparacion->Presu_Pte_Acept=="No"
	    				) &&
	    				( empty($reparacion->PRESUPUESTO) ||
	    						$reparacion->PRESUPUESTO=="No"
	    				) &&
	    				( empty($reparacion->ACEPTADO_P) ||
	    						$reparacion->ACEPTADO_P=="No"
	    				) &&
	    				( empty($reparacion->NO_ACEPTADO_P) ||
	    						$reparacion->NO_ACEPTADO_P=="No"
	    				) &&
	    				( empty($reparacion->PTE_MATERIAL_P) ||
	    						$reparacion->PTE_MATERIAL_P=="No"
	    				) &&
	    				( empty($reparacion->ACABADO_P) ||
	    						$reparacion->ACABADO_P=="No"
	    				) &&
	    				( empty($reparacion->PAGADO) ||
	    						$reparacion->PAGADO=="No"
	    				)
	    			){
	    				$status="001";
	    				$mensaje="Recibido Pendiente de Revisión";
	    			}
	    			//PEMDIENTE DE MATERIAL ---P2022GPD---
	    			else if( 
	    				( !empty($reparacion->Pendiente_Material) && 
	    						$reparacion->Pendiente_Material=="Si"
	    				) && 
	    				( empty($reparacion->Recogido) || 
	    						$reparacion->Recogido=="No" 
	    				) &&
	    				( empty($reparacion->Fecha_Reparacion)
	    				) &&
	    				( empty($reparacion->Fecha_Salida)
	    				) &&
	    				( empty($reparacion->ACABADO) ||
	    						$reparacion->ACABADO=="No"
	    				) &&
	    				( empty($repacion->Pte_Presu) ||
	    						$reparacion->Pte_Presu=="No"
	    				) &&
	    				( empty($reparacion->Presu_Pte_Acept) ||
	    						$reparacion->Presu_Pte_Acept=="No"
	    				) &&
	    				( empty($reparacion->PRESUPUESTO) ||
	    						$reparacion->PRESUPUESTO=="No"
	    				) &&
	    				( empty($reparacion->ACEPTADO_P) ||
	    						$reparacion->ACEPTADO_P=="No"
	    				) &&
	    				( empty($reparacion->NO_ACEPTADO_P) ||
	    						$reparacion->NO_ACEPTADO_P=="No"
	    				) &&
	    				( empty($reparacion->PTE_MATERIAL_P) ||
	    						$reparacion->PTE_MATERIAL_P=="No"
	    				) &&
	    				( empty($reparacion->ACABADO_P) ||
	    						$reparacion->ACABADO_P=="No"
	    				) &&
	    				( empty($reparacion->PAGADO) ||
	    						$reparacion->PAGADO=="No"
	    				)
	    			){
	    				$status="002";
	    				$mensaje="Pendiente de Material";
	    			}
	    			//ACABADO PENDIENTE DE ENVIAR  -- P2016DQN --
	    			else if( 
	    				( empty($reparacion->Pendiente_Material) ||
	    						$reparacion->Pendiente_Material=="No"
	    				) && 
	    				( empty($reparacion->Recogido) || 
	    						$reparacion->Recogido=="No" 
	    				) &&
	    				( !empty($reparacion->Fecha_Reparacion)
	    				) &&
	    				( empty($reparacion->Fecha_Salida)
	    				) &&
	    				( 
	    						$reparacion->ACABADO=="Si"
	    				) &&
	    				( empty($repacion->Pte_Presu) ||
	    						$reparacion->Pte_Presu=="No"
	    				) &&
	    				( empty($reparacion->Presu_Pte_Acept) ||
	    						$reparacion->Presu_Pte_Acept=="No"
	    				) &&
	    				( empty($reparacion->PRESUPUESTO) ||
	    						$reparacion->PRESUPUESTO=="No"
	    				) &&
	    				( empty($reparacion->ACEPTADO_P) ||
	    						$reparacion->ACEPTADO_P=="No"
	    				) &&
	    				( empty($reparacion->NO_ACEPTADO_P) ||
	    						$reparacion->NO_ACEPTADO_P=="No"
	    				) &&
	    				( empty($reparacion->PTE_MATERIAL_P) ||
	    						$reparacion->PTE_MATERIAL_P=="No"
	    				) &&
	    				( empty($reparacion->ACABADO_P) ||
	    						$reparacion->ACABADO_P=="No"
	    				) &&
	    				( empty($reparacion->PAGADO) ||
	    						$reparacion->PAGADO=="No"
	    				)
	    			){
	    				$status="003";
	    				$mensaje="Acabado. Pendiente de Enviar";
	    			}
	    			//ENVIADO --LR05BV7W--
	    			else if( 
	    				( empty($reparacion->Pendiente_Material) ||
	    						$reparacion->Pendiente_Material=="No"
	    				) && 
	    				( !empty($reparacion->Recogido) || 
	    						$reparacion->Recogido=="No" ||
	    						$reparacion->Recogido=="Si"
	    				) &&
	    				( !empty($reparacion->Fecha_Reparacion)
	    				) &&
	    				( !empty($reparacion->Fecha_Salida)
	    				) &&
	    				( $reparacion->ACABADO=="Si"
	    				) &&
	    				( empty($repacion->Pte_Presu) ||
	    						$reparacion->Pte_Presu=="No"
	    				) &&
	    				( empty($reparacion->Presu_Pte_Acept) ||
	    						$reparacion->Presu_Pte_Acept=="No"
	    				) &&
	    				( empty($reparacion->PRESUPUESTO) ||
	    						$reparacion->PRESUPUESTO=="No"
	    				) &&
	    				( empty($reparacion->ACEPTADO_P) ||
	    						$reparacion->ACEPTADO_P=="No"
	    				) &&
	    				( empty($reparacion->NO_ACEPTADO_P) ||
	    						$reparacion->NO_ACEPTADO_P=="No"
	    				) &&
	    				( empty($reparacion->PTE_MATERIAL_P) ||
	    						$reparacion->PTE_MATERIAL_P=="No"
	    				) &&
	    				( empty($reparacion->ACABADO_P) ||
	    						$reparacion->ACABADO_P=="No"
	    				) &&
	    				( empty($reparacion->PAGADO) ||
	    						$reparacion->PAGADO=="No"
	    				)
	    			){
	    				$status="004";
	    				$mensaje="Enviado.";
	    			}
    			}else{
    				//PENDIENTE ELABORACION PRESUPUESTO **SIN PROBAR** NO DATA
	    			if( 
	    				( empty($reparacion->Pendiente_Material) || 
	    						$reparacion->Pendiente_Material=="No"
	    				) && 
	    				( empty($reparacion->Recogido) || 
	    						$reparacion->Recogido=="No" 
	    				) &&
	    				( empty($reparacion->Fecha_Reparacion)
	    				) &&
	    				( empty($reparacion->Fecha_Salida)
	    				) &&
	    				( empty($reparacion->ACABADO) ||
	    						$reparacion->ACABADO=="No"
	    				) &&
	    				( !empty($repacion->Pte_Presu) &&
	    						$reparacion->Pte_Presu=="Si"
	    				) &&
	    				( empty($reparacion->Presu_Pte_Acept) ||
	    						$reparacion->Presu_Pte_Acept=="No"
	    				) &&
	    				( empty($reparacion->PRESUPUESTO) ||
	    						$reparacion->PRESUPUESTO=="No"
	    				) &&
	    				( empty($reparacion->ACEPTADO_P) ||
	    						$reparacion->ACEPTADO_P=="No"
	    				) &&
	    				( empty($reparacion->NO_ACEPTADO_P) ||
	    						$reparacion->NO_ACEPTADO_P=="No"
	    				) &&
	    				( empty($reparacion->PTE_MATERIAL_P) ||
	    						$reparacion->PTE_MATERIAL_P=="No"
	    				) &&
	    				( empty($reparacion->ACABADO_P) ||
	    						$reparacion->ACABADO_P=="No"
	    				) &&
	    				( empty($reparacion->PAGADO) ||
	    						$reparacion->PAGADO=="No"
	    				)
	    			){
	    				$status="005";
	    				$mensaje="Pendiente de la Elaboración del Presupuesto.";
	    			}
	    			//PENDIENTE DE ACEPTACION --P2022F6Y--
	    			else if( 
	    				( empty($reparacion->Pendiente_Material) || 
	    						$reparacion->Pendiente_Material=="No"
	    				) && 
	    				( empty($reparacion->Recogido) || 
	    						$reparacion->Recogido=="No" 
	    				) &&
	    				( empty($reparacion->Fecha_Reparacion)
	    				) &&
	    				( empty($reparacion->Fecha_Salida)
	    				) &&
	    				( empty($reparacion->ACABADO) ||
	    						$reparacion->ACABADO=="No"
	    				) &&
	    				( $reparacion->Pte_Presu=="No"
	    				) &&
	    				( !empty($reparacion->Presu_Pte_Acept) &&
	    						$reparacion->Presu_Pte_Acept=="Si"
	    				) &&
	    				( !empty($reparacion->PRESUPUESTO) &&
	    						$reparacion->PRESUPUESTO=="Si"
	    				) &&
	    				( empty($reparacion->ACEPTADO_P) ||
	    						$reparacion->ACEPTADO_P=="No"
	    				) &&
	    				( empty($reparacion->NO_ACEPTADO_P) ||
	    						$reparacion->NO_ACEPTADO_P=="No"
	    				) &&
	    				( empty($reparacion->PTE_MATERIAL_P) ||
	    						$reparacion->PTE_MATERIAL_P=="No"
	    				) &&
	    				( empty($reparacion->ACABADO_P) ||
	    						$reparacion->ACABADO_P=="No"
	    				) &&
	    				( empty($reparacion->PAGADO) ||
	    						$reparacion->PAGADO=="No"
	    				)
	    			){
	    				$status="006";
	    				$mensaje="Pendiente de Aceptación/Rechazo del Presupuesto.";
	    			}
	    			/*
	   				------------------ACEPTADO ---------------------
	    			*/
	    			//PENDIENTE DE MATERIAL --P20116H5--
	    			else if( 
	    				( empty($reparacion->Pendiente_Material) || 
	    						$reparacion->Pendiente_Material=="No"
	    				) && 
	    				( empty($reparacion->Recogido) || 
	    						$reparacion->Recogido=="No" 
	    				) &&
	    				( empty($reparacion->Fecha_Reparacion)
	    				) &&
	    				( empty($reparacion->Fecha_Salida)
	    				) &&
	    				( empty($reparacion->ACABADO) ||
	    						$reparacion->ACABADO=="No"
	    				) &&
	    				( $reparacion->Pte_Presu=="No"
	    				) &&
	    				( $reparacion->Presu_Pte_Acept=="No"
	    				) &&
	    				( $reparacion->PRESUPUESTO=="Si"
	    				) &&
	    				( $reparacion->ACEPTADO_P=="Si"
	    				) &&
	    				( $reparacion->NO_ACEPTADO_P=="No"
	    				) &&
	    				( $reparacion->PTE_MATERIAL_P=="Si"
	    				) &&
	    				( empty($reparacion->ACABADO_P) ||
	    						$reparacion->ACABADO_P=="No"
	    				)
	    			){
	    				$status="007";
	    				$mensaje="Presupuesto Aceptado. Pendiente de Material.";
	    			}
	    			//ACABADO PENDIENTE DE ENVIO -- P20116F6 --
	    			else if( 
	    				( empty($reparacion->Pendiente_Material) || 
	    						$reparacion->Pendiente_Material=="No"
	    				) && 
	    				( empty($reparacion->Recogido) || 
	    						$reparacion->Recogido=="No" 
	    				) &&
	    				( !empty($reparacion->Fecha_Reparacion)
	    				) &&
	    				( empty($reparacion->Fecha_Salida)
	    				) &&
	    				( empty($reparacion->ACABADO) ||
	    						$reparacion->ACABADO=="No"
	    				) &&
	    				( $reparacion->Pte_Presu=="No"
	    				) &&
	    				( $reparacion->Presu_Pte_Acept=="No"
	    				) &&
	    				( $reparacion->PRESUPUESTO=="Si"
	    				) &&
	    				( $reparacion->ACEPTADO_P=="Si"
	    				) &&
	    				( $reparacion->NO_ACEPTADO_P=="No"
	    				) &&
	    				( $reparacion->PTE_MATERIAL_P=="No"
	    				) &&
	    				( $reparacion->ACABADO_P=="Si"
	    				)
	    			){
	    				$status="008";
	    				$mensaje="Presupuesto Aceptado. Acabado, pendiente el Envío.";
	    			}
	    			//ENVIADO -- P2016DT6 --
	    			else if( 
	    				( empty($reparacion->Pendiente_Material) || 
	    						$reparacion->Pendiente_Material=="No"
	    				) && 
	    				( $reparacion->Recogido=="Si" 
	    				) &&
	    				( !empty($reparacion->Fecha_Reparacion)
	    				) &&
	    				( !empty($reparacion->Fecha_Salida)
	    				) &&
	    				( empty($reparacion->ACABADO) ||
	    						$reparacion->ACABADO=="No"
	    				) &&
	    				( $reparacion->Pte_Presu=="No"
	    				) &&
	    				( $reparacion->Presu_Pte_Acept=="No"
	    				) &&
	    				( $reparacion->PRESUPUESTO=="Si"
	    				) &&
	    				( $reparacion->ACEPTADO_P=="Si"
	    				) &&
	    				( $reparacion->NO_ACEPTADO_P=="No"
	    				) &&
	    				( $reparacion->PTE_MATERIAL_P=="No"
	    				) &&
	    				( $reparacion->ACABADO_P=="Si"
	    				)
	    			){
	    				$status="009";
	    				$mensaje="Presupuesto Aceptado. Enviado.";
	    			}
	    			/*
					---------------NO ACEPTADO ----------------------
	    			*/
					//PRESUPUESTO RECHAZADO PENDIENTE DE ENVIO -- LR04G27G --
					else if( 
	    				( empty($reparacion->Pendiente_Material) || 
	    						$reparacion->Pendiente_Material=="No"
	    				) && 
	    				( empty($reparacion->Recogido) ||
	    						$reparacion->Recogido=="No" 
	    				) &&
	    				( !empty($reparacion->Fecha_Reparacion)
	    				) &&
	    				( empty($reparacion->Fecha_Salida)
	    				) &&
	    				( empty($reparacion->ACABADO) ||
	    						$reparacion->ACABADO=="No"
	    				) &&
	    				( $reparacion->Pte_Presu=="No"
	    				) &&
	    				( $reparacion->Presu_Pte_Acept=="No"
	    				) &&
	    				( $reparacion->PRESUPUESTO=="Si"
	    				) &&
	    				( $reparacion->ACEPTADO_P=="No"
	    				) &&
	    				( $reparacion->NO_ACEPTADO_P=="Si"
	    				) &&
	    				( $reparacion->PTE_MATERIAL_P=="No"
	    				) &&
	    				( $reparacion->ACABADO_P=="Si"
	    				)
	    			){
	    				$status="010";
	    				$mensaje="Presupuesto Rechazado. Pendiente de Envío.";
	    			}
	    			//PRESUPUESTO RECHAZADO ENVIADO -- PF0E68XJ --
					else if( 
	    				( empty($reparacion->Pendiente_Material) || 
	    						$reparacion->Pendiente_Material=="No"
	    				) && 
	    				( empty($reparacion->Recogido) ||
	    						$reparacion->Recogido=="Si" 
	    				) &&
	    				( !empty($reparacion->Fecha_Reparacion)
	    				) &&
	    				( !empty($reparacion->Fecha_Salida)
	    				) &&
	    				( empty($reparacion->ACABADO) ||
	    						$reparacion->ACABADO=="No"
	    				) &&
	    				( $reparacion->Pte_Presu=="No"
	    				) &&
	    				( $reparacion->Presu_Pte_Acept=="No"
	    				) &&
	    				( $reparacion->PRESUPUESTO=="Si"
	    				) &&
	    				( $reparacion->ACEPTADO_P=="No"
	    				) &&
	    				( $reparacion->NO_ACEPTADO_P=="Si"
	    				) &&
	    				( $reparacion->PTE_MATERIAL_P=="No"
	    				) &&
	    				( $reparacion->ACABADO_P=="Si"
	    				)
	    			){
	    				$status="011";
	    				$mensaje="Presupuesto Rechazado. Enviado.";
	    			}
    			}
    				
    		}
    		return response()->json([
    				'reparacion'=>$reparacion,
    				'status'=>$status,
    				'mensaje'=>$mensaje
    			]);	
    	} catch (Exception $e) {
    		return response()->json([
    				'reparacion'=>[],
    				'status'=>"999",
    				'mensaje'=>"Ocurrió un error, por favor intente de nuevo."
    			]);	
    	}
    }

}
