<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Seo extends Model

{
	use UsesTenantConnection;
	protected $table = 'site_seo';
	public $timestamps = true;
}