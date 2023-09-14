<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Nota extends Model

{


    protected $table = 'notas_comunidades';
    
    protected $fillable = ['titulo', 'slug', 'descripcion', 'contenido', 'imagen', 'visualizacion', 'nota_comunidad_id', 'respnsive', 'area_id', 'roles', 'tema_id', 'parametro_id' ];

	public $timestamps = false;

}



