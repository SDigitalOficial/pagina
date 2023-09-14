<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Estadistica extends Model

{
use UsesTenantConnection;

protected $table = 'estadistica';
	public $timestamps = false;

}