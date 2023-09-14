<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Maxo extends Model

{
	use UsesTenantConnection;

	protected $table = 'collapse';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Content');
	}

}