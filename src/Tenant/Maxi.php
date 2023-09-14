<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Maxi extends Model

{
	use UsesTenantConnection;

	protected $table = 'contents';
	public $timestamps = false;

	public function images(){

		return $this->belongsTo('Image');
	}

}



