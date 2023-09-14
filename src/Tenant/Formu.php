<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Formu extends Model

{
	use UsesTenantConnection;

	protected $table = 'inputs';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('DigitalsiteSaaS\Pagina\Tenant\Content');
	}

}


