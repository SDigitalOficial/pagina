<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Content extends Model

{
    use UsesTenantConnection;

	protected $fillable = ['id', 'title', 'description', 'content', 'image', 'url', 'position', 'type', 'num', 'level', 'imageal', 'responsive','animacion','page_id','nivel','roles' ];

	public $timestamps = true;

	public function pages(){

		return $this->belongsTo('DigitalsiteSaaS\Pagina\Tenant\Page');
	}

	public function subpages(){

		return $this->belongsTo('Subpage');
	}

		public function images(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Tenant\Maxi');

	}

		public function imagescar(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Tenant\Carousel');

	}

		public function collapses(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Tenant\Maxo');

	}

			public function tabs(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Tenant\Maxu');

	}

			public function empleo(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Tenant\Empleo');

	}

			public function shuffles(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Tenant\Maxe');

	}

			public function formus(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Tenant\Formu');

	}

}

