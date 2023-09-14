<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Maxe extends Model

{


	protected $table = 'shuffle';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Content');
	}

}

