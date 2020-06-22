<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrar extends Model
{
    protected $guarded = [ 'id' ];

    /**
     * @return string
     */
    public function getRouteKeyName (){ return 'smart_id'; }
}
