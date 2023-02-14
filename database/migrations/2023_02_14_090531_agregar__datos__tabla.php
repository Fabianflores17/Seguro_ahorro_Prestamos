<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AgregarDatosTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('categorias')->insert([
       
                ['id' => '1','name' => 'Ahorros','created_at' => '2023-02-13 00:00:00','updated_at' => NULL],
                ['id' => '2','name' => 'Prestamos','created_at' => '2023-02-13 00:00:00','updated_at' => NULL],
                ['id' => '3','name' => 'Seguros','created_at' => '2023-02-13 00:00:00','updated_at' => NULL]
          
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}


