<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Maxicar extends Model

{


	protected $table = 'carousel';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Content');
	}

}


