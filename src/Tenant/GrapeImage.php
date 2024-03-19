<?php

namespace DigitalsiteSaaS\Pagina\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class GrapeImage extends Model{

use UsesTenantConnection;
 protected $table = 'grape_image';
 public $timestamps = false;
}
 

