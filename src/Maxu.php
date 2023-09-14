<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Maxu extends Model

{
	

	protected $table = 'tabs';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Content');
	}

}

