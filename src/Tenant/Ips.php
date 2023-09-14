<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Ips extends Model

{
	use UsesTenantConnection;

	protected $table = 'ips';
	public $timestamps = false;


}