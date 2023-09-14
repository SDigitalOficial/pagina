<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Baner extends Model

{


	protected $table = 'banners';
	public $timestamps = true;

	public function pages(){

	return $this->belongsTo('Page');
	}


}