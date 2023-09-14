<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Venta extends Model

{

use UsesTenantConnection;

protected $table = 'venta';
	public $timestamps = false;

}