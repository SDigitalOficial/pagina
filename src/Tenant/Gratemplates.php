<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Gratemplates extends Model{
		use UsesTenantConnection;
 protected $table = 'grape_componentes';
 public $timestamps = false;
}
 