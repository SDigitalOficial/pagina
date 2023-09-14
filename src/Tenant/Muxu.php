<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Muxu extends Model

{
	use UsesTenantConnection;
	
	protected $table = 'ficha';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Page');
	}

}