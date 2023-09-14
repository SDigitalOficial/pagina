<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Formu extends Model

{

	protected $table = 'inputs';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Content');
	}

}
