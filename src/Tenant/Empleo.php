<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Empleo extends Model

{

	use UsesTenantConnection;

	protected $table = 'empleos';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Content');
	}

}

