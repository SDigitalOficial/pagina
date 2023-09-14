<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;



class Ciudad extends Model

{

use UsesTenantConnection;

protected $table = 'ciudades';
	public $timestamps = false;



}