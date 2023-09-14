<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Illuminate\Database\Eloquent\Model;


class Recaptcha extends Model

{
	use UsesTenantConnection;

	protected $table = 'recaptcha';
	public $timestamps = false;

}


