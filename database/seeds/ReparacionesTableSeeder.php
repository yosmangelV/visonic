<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ReparacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reparaciones')->insert([
            'N_reparacion'=> Str::random(10),
            'N_Serie' =>'P201MQLK',
            'Codigo_Cliente'=>Str::random(10),
            'Albaran_Cliente'=>Str::random(10),
            'Marca'=>'LENOVO',
            'Modelo'=>'LKL1',
            'N_RMA' =>Str::random(10),
            'Pendiente_Material'=>'No',
            'Recogido'=>'No',
            'Fecha_Reparacion'=>'',
            'Fecha_Salida'=>'',
            'Fecha_Entrada'=>Carbon::now(),
            'ACABADO'=>'No',
            'Garantia'=>'Si',
            'Pte_Presu'=>'',
            'Presu_Pte_Acept'=>'',
            'Estado'=>'Reparando',
            'PRESUPUESTO'=>'No',
            'ACEPTADO_P'=>'No',
            'NO_ACEPTADO_P'=>'No',
            'PTE_MATERIAL_P'=>'No',
            'ACABADO_P'=>'No',
            'PAGADO'=>'No'
        ]);

        DB::table('reparaciones')->insert([
            'N_reparacion'=> Str::random(10),
            'N_Serie' =>'P2022GPD',
            'Codigo_Cliente'=>Str::random(10),
            'Albaran_Cliente'=>Str::random(10),
            'Marca'=>'LENOVO',
            'Modelo'=>'LLLNO',
            'N_RMA' =>Str::random(10),
            'Pendiente_Material'=>'Si',
            'Recogido'=>'No',
            'Fecha_Reparacion'=>'',
            'Fecha_Salida'=>'',
            'Fecha_Entrada'=>Carbon::now(),
            'ACABADO'=>'No',
            'Garantia'=>'Si',
            'Pte_Presu'=>'',
            'Presu_Pte_Acept'=>'',
            'Estado'=>'Reparando',
            'PRESUPUESTO'=>'No',
            'ACEPTADO_P'=>'No',
            'NO_ACEPTADO_P'=>'No',
            'PTE_MATERIAL_P'=>'No',
            'ACABADO_P'=>'No',
            'PAGADO'=>'No'
        ]);

        DB::table('reparaciones')->insert([
            'N_reparacion'=> Str::random(10),
            'N_Serie' =>'P2016DQN',
            'Codigo_Cliente'=>Str::random(10),
            'Albaran_Cliente'=>Str::random(10),
            'Marca'=>'LENOVO',
            'Modelo'=>'LLLXO',
            'N_RMA' =>Str::random(10),
            'Pendiente_Material'=>'No',
            'Recogido'=>'No',
            'Fecha_Reparacion'=>Carbon::tomorrow(),
            'Fecha_Salida'=>'',
            'Fecha_Entrada'=>Carbon::now(),
            'ACABADO'=>'Si',
            'Garantia'=>'Si',
            'Pte_Presu'=>'',
            'Presu_Pte_Acept'=>'',
            'Estado'=>'Reparando',
            'PRESUPUESTO'=>'No',
            'ACEPTADO_P'=>'No',
            'NO_ACEPTADO_P'=>'No',
            'PTE_MATERIAL_P'=>'No',
            'ACABADO_P'=>'No',
            'PAGADO'=>'No'
        ]);

        DB::table('reparaciones')->insert([
            'N_reparacion'=> Str::random(10),
            'N_Serie' =>'LR05BV7W',
            'Codigo_Cliente'=>Str::random(10),
            'Albaran_Cliente'=>Str::random(10),
            'Marca'=>'LENOVO',
            'Modelo'=>'LLLHO',
            'N_RMA' =>Str::random(10),
            'Pendiente_Material'=>'No',
            'Recogido'=>'No',
            'Fecha_Reparacion'=>Carbon::tomorrow(),
            'Fecha_Salida'=>Carbon::tomorrow(),
            'Fecha_Entrada'=>Carbon::now(),
            'ACABADO'=>'Si',
            'Garantia'=>'Si',
            'Pte_Presu'=>'',
            'Presu_Pte_Acept'=>'',
            'Estado'=>'Reparando',
            'PRESUPUESTO'=>'No',
            'ACEPTADO_P'=>'No',
            'NO_ACEPTADO_P'=>'No',
            'PTE_MATERIAL_P'=>'No',
            'ACABADO_P'=>'No',
            'PAGADO'=>'No'
        ]);

        DB::table('reparaciones')->insert([
            'N_reparacion'=> Str::random(10),
            'N_Serie' =>'LDFV4T6W',
            'Codigo_Cliente'=>Str::random(10),
            'Albaran_Cliente'=>Str::random(10),
            'Marca'=>'LENOVO',
            'Modelo'=>'LLLQO',
            'N_RMA' =>Str::random(10),
            'Pendiente_Material'=>'No',
            'Recogido'=>'No',
            'Fecha_Reparacion'=>'',
            'Fecha_Salida'=>'',
            'Fecha_Entrada'=>Carbon::now(),
            'ACABADO'=>'No',
            'Garantia'=>'No',
            'Pte_Presu'=>'Si',
            'Presu_Pte_Acept'=>'No',
            'Estado'=>'Reparando',
            'PRESUPUESTO'=>'No',
            'ACEPTADO_P'=>'No',
            'NO_ACEPTADO_P'=>'No',
            'PTE_MATERIAL_P'=>'No',
            'ACABADO_P'=>'No',
            'PAGADO'=>'No'
        ]);

        DB::table('reparaciones')->insert([
            'N_reparacion'=> Str::random(10),
            'N_Serie' =>'P2022F6Y',
            'Codigo_Cliente'=>Str::random(10),
            'Albaran_Cliente'=>Str::random(10),
            'Marca'=>'LENOVO',
            'Modelo'=>'LLLWO',
            'N_RMA' =>Str::random(10),
            'Pendiente_Material'=>'No',
            'Recogido'=>'No',
            'Fecha_Reparacion'=>'',
            'Fecha_Salida'=>'',
            'Fecha_Entrada'=>Carbon::now(),
            'ACABADO'=>'No',
            'Garantia'=>'No',
            'Pte_Presu'=>'No',
            'Presu_Pte_Acept'=>'Si',
            'Estado'=>'Reparando',
            'PRESUPUESTO'=>'Si',
            'ACEPTADO_P'=>'No',
            'NO_ACEPTADO_P'=>'No',
            'PTE_MATERIAL_P'=>'No',
            'ACABADO_P'=>'No',
            'PAGADO'=>'No'
        ]);

        DB::table('reparaciones')->insert([
            'N_reparacion'=> Str::random(10),
            'N_Serie' =>'P20116H5',
            'Codigo_Cliente'=>Str::random(10),
            'Albaran_Cliente'=>Str::random(10),
            'Marca'=>'LENOVO',
            'Modelo'=>'LLLWO',
            'N_RMA' =>Str::random(10),
            'Pendiente_Material'=>'No',
            'Recogido'=>'No',
            'Fecha_Reparacion'=>'',
            'Fecha_Salida'=>'',
            'Fecha_Entrada'=>Carbon::now(),
            'ACABADO'=>'No',
            'Garantia'=>'No',
            'Pte_Presu'=>'No',
            'Presu_Pte_Acept'=>'No',
            'Estado'=>'Reparando',
            'PRESUPUESTO'=>'Si',
            'ACEPTADO_P'=>'Si',
            'NO_ACEPTADO_P'=>'No',
            'PTE_MATERIAL_P'=>'Si',
            'ACABADO_P'=>'No',
            'PAGADO'=>'No'
        ]);

        DB::table('reparaciones')->insert([
            'N_reparacion'=> Str::random(10),
            'N_Serie' =>'P20116F6',
            'Codigo_Cliente'=>Str::random(10),
            'Albaran_Cliente'=>Str::random(10),
            'Marca'=>'LENOVO',
            'Modelo'=>'LLLAO',
            'N_RMA' =>Str::random(10),
            'Pendiente_Material'=>'No',
            'Recogido'=>'No',
            'Fecha_Reparacion'=>Carbon::tomorrow(),
            'Fecha_Salida'=>'',
            'Fecha_Entrada'=>Carbon::now(),
            'ACABADO'=>'No',
            'Garantia'=>'No',
            'Pte_Presu'=>'No',
            'Presu_Pte_Acept'=>'No',
            'Estado'=>'Reparando',
            'PRESUPUESTO'=>'Si',
            'ACEPTADO_P'=>'Si',
            'NO_ACEPTADO_P'=>'No',
            'PTE_MATERIAL_P'=>'No',
            'ACABADO_P'=>'Si',
            'PAGADO'=>'No'
        ]);

        DB::table('reparaciones')->insert([
            'N_reparacion'=> Str::random(10),
            'N_Serie' =>'LR04G27G',
            'Codigo_Cliente'=>Str::random(10),
            'Albaran_Cliente'=>Str::random(10),
            'Marca'=>'LENOVO',
            'Modelo'=>'LLLIO',
            'N_RMA' =>Str::random(10),
            'Pendiente_Material'=>'No',
            'Recogido'=>'No',
            'Fecha_Reparacion'=>Carbon::tomorrow(),
            'Fecha_Salida'=>'',
            'Fecha_Entrada'=>Carbon::now(),
            'ACABADO'=>'No',
            'Garantia'=>'No',
            'Pte_Presu'=>'No',
            'Presu_Pte_Acept'=>'No',
            'Estado'=>'Reparando',
            'PRESUPUESTO'=>'Si',
            'ACEPTADO_P'=>'No',
            'NO_ACEPTADO_P'=>'Si',
            'PTE_MATERIAL_P'=>'No',
            'ACABADO_P'=>'Si',
            'PAGADO'=>'No'
        ]);

        DB::table('reparaciones')->insert([
            'N_reparacion'=> Str::random(10),
            'N_Serie' =>'PF0E68XJ',
            'Codigo_Cliente'=>Str::random(10),
            'Albaran_Cliente'=>Str::random(10),
            'Marca'=>'LENOVO',
            'Modelo'=>'LLLIO',
            'N_RMA' =>Str::random(10),
            'Pendiente_Material'=>'No',
            'Recogido'=>'Si',
            'Fecha_Reparacion'=>Carbon::tomorrow(),
            'Fecha_Salida'=>Carbon::tomorrow(),
            'Fecha_Entrada'=>Carbon::now(),
            'ACABADO'=>'No',
            'Garantia'=>'No',
            'Pte_Presu'=>'No',
            'Presu_Pte_Acept'=>'No',
            'Estado'=>'Reparando',
            'PRESUPUESTO'=>'Si',
            'ACEPTADO_P'=>'No',
            'NO_ACEPTADO_P'=>'Si',
            'PTE_MATERIAL_P'=>'No',
            'ACABADO_P'=>'Si',
            'PAGADO'=>'No'
        ]);
    }
}
