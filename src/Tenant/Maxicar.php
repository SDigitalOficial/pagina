<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Maxicar extends Model

{
	use UsesTenantConnection;

	protected $table = 'carousel';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Content');
	}

}


