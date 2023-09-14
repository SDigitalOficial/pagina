<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Inputweb extends Model

{
	use UsesTenantConnection;

	protected $table = 'inputs';
	public $timestamps = true;

}