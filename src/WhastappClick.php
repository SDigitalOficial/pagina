<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappClick extends Model {
    use HasFactory;
    protected $fillable = ['slug', 'utm_source', 'utm_medium', 'utm_campaign', 'medium'];
}
