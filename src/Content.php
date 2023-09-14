<?php

namespace DigitalsiteSaaS\Pagina;


use Illuminate\Database\Eloquent\Model;


class Content extends Model

{


	protected $fillable = ['id', 'title', 'description', 'content', 'image', 'url', 'position', 'type', 'num', 'level', 'imageal', 'responsive','animacion','page_id','nivel','roles' ];

	public $timestamps = true;

	public function pages(){

		return $this->belongsTo('DigitalsiteSaaS\Pagina\Page');
	}

	public function subpages(){

		return $this->belongsTo('Subpage');
	}

		public function images(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Maxi');

	}

		public function imagescar(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Carousel');

	}

		public function collapses(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Maxo');

	}

			public function tabs(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Maxu');

	}

			public function empleo(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Empleo');

	}

			public function shuffles(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Maxe');

	}

			public function formus(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Formu');

	}

}

