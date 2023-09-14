<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Empleo extends Model

{


	protected $table = 'empleos';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Content');
	}

}

