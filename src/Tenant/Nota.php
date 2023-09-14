<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Nota extends Model

{
	use UsesTenantConnection;

    protected $table = 'notas_comunidades';
    
    protected $fillable = ['titulo', 'slug', 'descripcion', 'contenido', 'imagen', 'visualizacion', 'nota_comunidad_id', 'respnsive', 'area_id', 'roles', 'tema_id', 'parametro_id' ];

	public $timestamps = false;

}



