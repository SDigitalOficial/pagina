<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Select extends Model

{
	use UsesTenantConnection;

	protected $table = 'selectors';
	public $timestamps = false;

	
}