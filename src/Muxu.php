<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;

class Muxu extends Model

{
	
	protected $table = 'ficha';
	public $timestamps = false;

	public function contents(){

		return $this->belongsTo('Page');
	}

}