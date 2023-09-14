<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Zippera extends Model

{

	use UsesTenantConnection;
	

	protected $table = 'templa';
	public $timestamps = false;

	

}
