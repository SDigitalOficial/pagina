<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Baner extends Model

{
	use UsesTenantConnection;

	protected $table = 'banners';
	public $timestamps = true;

	public function pages(){

	return $this->belongsTo('Page');
	}


}