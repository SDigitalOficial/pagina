<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Fichaje extends Model

{
	use UsesTenantConnection;

	protected $table = 'ficha';
    public $timestamps = true;

    	public function pages(){

		return $this->belongsTo('Page');
	}

		public function images(){
	return $this->hasMany('Maxi');

	}

		public function users(){

//Se relaciona uno a muchos
		return $this->belongsTo('Usuario');
	}
}
