<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Carousel extends Model

{

	
	
	protected $table = 'carousel_image';
	public $timestamps = false;

public function contents(){

		return $this->belongsTo('Content');
	}
}


