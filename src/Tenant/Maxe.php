<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Maxe extends Model

{
	use UsesTenantConnection;

	protected $table = 'shuffle';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Content');
	}

}

