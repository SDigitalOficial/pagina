<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Color extends Model

{
	use UsesTenantConnection;
	
	protected $table = 'colors';
	public $timestamps = false;

}


