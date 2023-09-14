<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Paiscon extends Model

{
	use UsesTenantConnection;

protected $table = 'paises';
	public $timestamps = false;



}