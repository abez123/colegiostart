<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaestrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('maestros', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->char('sexo');
            $table->string('direccion');
            $table->string('colonia');
            $table->string('cp');
            $table->string('telefonos');
            $table->string('email');
            $table->string('profesion');
            $table->text('mision');
            $table->text('cursos');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('maestros');
	}

}
