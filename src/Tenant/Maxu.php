<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Maxu extends Model

{
	use UsesTenantConnection;

	protected $table = 'tabs';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Content');
	}

}

