<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Template extends Model

{
	use UsesTenantConnection;

	protected $table = 'template';
	public $timestamps = false;

}