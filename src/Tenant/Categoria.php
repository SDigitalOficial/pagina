<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Categoria extends Model

{

use UsesTenantConnection;

protected $table = 'categoriapro';
	public $timestamps = false;

}