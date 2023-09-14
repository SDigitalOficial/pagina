<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Diagrama extends Model

{

use UsesTenantConnection;

protected $table = 'diagramas';
	public $timestamps = false;

}