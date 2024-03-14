<?php

namespace DigitalsiteSaaS\Pagina\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;

use Illuminate\Database\Eloquent\Model;


class GrapeTemp extends Model{
 
 use UsesTenantConnection;

  protected $table = 'grape_template';
  public $timestamps = true; 

}


