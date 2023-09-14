<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Whatsapp extends Model

{
	use UsesTenantConnection;

	protected $table = 'whatsapps';
	public $timestamps = false;

	
}