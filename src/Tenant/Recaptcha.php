<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Recaptcha extends Model
{
    use UsesTenantConnection;

	protected $table = 'recaptcha';
	public $timestamps = false;
}