<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Shuffleweb extends Model

{
	use UsesTenantConnection;

	protected $table = 'shuffleweb';
	public $timestamps = true;

}

