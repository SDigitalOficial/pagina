<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Fichaje extends Model

{
	

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
