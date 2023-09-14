<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Image extends Model

{
	use UsesTenantConnection;

	protected $table = 'fichaimg';
	public $timestamps = false;

	
}