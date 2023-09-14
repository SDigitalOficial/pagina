<?php

namespace DigitalsiteSaaS\Pagina;


use Illuminate\Database\Eloquent\Model;


class Page extends Model

{

	

	protected $table = 'pages';
    public $timestamps = true;

		public function contents(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Content')->orderby('position', 'asc');

	}

		public function products(){
	return $this->hasMany('DigitalsiteSaaS\Carrito\Product')->orderby('position', 'asc');

	}

		public function blogs(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Bloguero')->orderby('created_at', 'desc');

	}

		public function fichas(){
	return $this->hasMany('DigitalsiteSaaS\Pagina\Fichaje');

	}


	 public function subpaginas(){

     	return $this->hasMany('DigitalsiteSaaS\Pagina\Page')->orderBy('posta', 'desc');
     }

 public function banners(){

     	return $this->hasMany('DigitalsiteSaaS\Pagina\Baner');
     }

}



