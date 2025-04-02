<?php

namespace DigitalsiteSaaS\Pagina\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class WhatsappClick extends Model {
    use UsesTenantConnection;
    protected $fillable = ['slug', 'utm_source', 'utm_medium', 'utm_campaign', 'medium'];
}

