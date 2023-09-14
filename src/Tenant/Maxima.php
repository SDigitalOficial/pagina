<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Maxima extends Model

{
	use UsesTenantConnection;

	protected $table = 'images';
	public $timestamps = false;

}



