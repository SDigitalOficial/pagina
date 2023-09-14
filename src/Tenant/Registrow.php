<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Registrow extends Model

{
	use UsesTenantConnection;

protected $table = 'comunidad_registro';
	public $timestamps = True;

}