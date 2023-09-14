<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Message extends Model

{
	use UsesTenantConnection;

	protected $fillable = [
    'nombre', 'sujeto', 'cargo', 'email', 'interes', 'datos', 'mensaje', 'empresa', 'remember_token',
    ];

	protected $table = 'mesage';
	public $timestamps = true;

	
}