<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Bloguero extends Model

{

	use UsesTenantConnection;
	
	protected $table = 'blog';
    public $timestamps = true;

    	public function pages(){

		return $this->belongsTo('DigitalsiteSaaS\Pagina\Tenant\Page');
	}

		public function images(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Tenant\Maxi');

	}
}

	

















