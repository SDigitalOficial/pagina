<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;


class Messagema extends Model

{
	use UsesTenantConnection;

	protected $fillable = [
    'campo1', 'campo2', 'campo3', 'campo4', 'campo5', 'campo6', 'campo7', 'campo8', 'campo9', 'campo10', 'campo11', 'campo12', 'campo13', 'campo14', 'campo15', 'campo16', 'campo17', 'campo18', 'campo19', 'campo20', 'form_id','estado', 'email', 'radio', 'remember_token',
    ];

	protected $table = 'mesagema';
	public $timestamps = true;

	
}