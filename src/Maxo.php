<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Maxo extends Model

{
	

	protected $table = 'collapse';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Content');
	}

}