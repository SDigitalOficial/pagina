<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Model;


class Message extends Model

{
	

	protected $fillable = [
    'nombre', 'sujeto', 'cargo', 'email', 'interes', 'datos', 'mensaje', 'empresa', 'remember_token',
    ];

	protected $table = 'mesage';
	public $timestamps = true;

	
}