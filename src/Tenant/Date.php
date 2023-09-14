<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Date extends Model

{

use UsesTenantConnection;

protected $table = 'datos';
	public $timestamps = false;

}