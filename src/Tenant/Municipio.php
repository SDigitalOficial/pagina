<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;



class Municipio extends Model

{
use UsesTenantConnection;

protected $table = 'municipios';
	public $timestamps = false;



}