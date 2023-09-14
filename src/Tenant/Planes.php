<?php
namespace DigitalsiteSaaS\Pagina\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Planes extends Model{
	protected $table = 'planes';
	public $timestamps = false;
}

