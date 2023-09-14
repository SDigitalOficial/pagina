<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Conte extends Model

{
	use UsesTenantConnection;

	protected $table = 'posicion';
	public $timestamps = true;

}



