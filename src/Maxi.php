<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Maxi extends Model

{


	protected $table = 'contents';
	public $timestamps = false;

	public function images(){

		return $this->belongsTo('Image');
	}

}


