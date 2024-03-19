<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Grapeselect extends Model{
		use UsesTenantConnection;
 protected $table = 'grape_select';
 public $timestamps = false;
}
 