<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;



class Departamentocon extends Model

{

use UsesTenantConnection;

protected $table = 'departamentos';
	public $timestamps = false;



}