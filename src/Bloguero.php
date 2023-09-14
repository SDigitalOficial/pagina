<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Bloguero extends Model

{


	
	protected $table = 'blog';
    public $timestamps = true;

    	public function pages(){

		return $this->belongsTo('Page');
	}

		public function images(){
	return $this->hasMany('Maxi');

	}
}

	

















